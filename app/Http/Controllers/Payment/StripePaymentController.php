<?php

namespace App\Http\Controllers\Payment;

use App\Http\Controllers\Controller;
use App\Models\Credit;
use Illuminate\Http\Request;
use Session;
use Stripe;

class StripePaymentController extends Controller
{
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripePost(Request $request)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        try {
            // Attempt to charge the card
            Stripe\Charge::create([
                "amount" => session('fund-amount') * 100,
                "currency" => "USD",
                "source" => $request->stripeToken,
                "description" => "IMEI Fund Add"
            ]);

            // Update credit
            $userIp = $request->ip();
            $credit = Credit::where('ip', $userIp)->first();
            if ($credit) {
                $credit->credit += session('fund-amount');
                $credit->save();
            }

            $request->session()->put('fund-amount', '0');

            toastr()->success('Payment successful!', ['timeOut' => 5000, 'closeButton' => true]);

            return redirect()->route('dashboard.index');
        } catch (\Stripe\Exception\CardException $e) {
            // Handle the error
            toastr()->error('Payment failed: ' . $e->getError()->message, ['timeOut' => 5000, 'closeButton' => true]);
            return redirect()->route('checkout')->withErrors(['error' => 'Payment failed: ' . $e->getError()->message]);
        }
    }
}
