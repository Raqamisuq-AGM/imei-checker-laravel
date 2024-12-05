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
        try {
            // Attempt to charge the card
            // Stripe\Stripe::setApiKey(env('STRIPE_SECRET_TEST'));
            Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

            // $domain = 'http://localhost:8000/';
            $domain = 'https://icheckimeipro.info/';

            $checkout_session = \Stripe\Checkout\Session::create([
                'payment_method_types' => ['card'],
                'line_items' => [[
                    'price_data' => [
                        'currency' => 'usd',
                        'product_data' => [
                            'name' => ' Add Fund to Icheck IMEI Pro',
                        ],
                        'unit_amount' => $request->stripe_amount * 100,
                    ],
                    'quantity' => 1,
                ]],
                'mode' => 'payment',
                'success_url' => $domain . 'stripe/success' . $request->stripe_amount,
                'cancel_url' => $domain . 'add-fund',
            ]);
            return Redirect($checkout_session->url);
        } catch (\Stripe\Exception\CardException $e) {
            // Handle the error
            toastr()->error('Payment failed: ' . $e->getError()->message, ['timeOut' => 5000, 'closeButton' => true]);
            return redirect()->route('buy.credit.fund')->withErrors(['error' => 'Payment failed: ' . $e->getError()->message]);
        }
    }

    public function success(Request $request, $amount)
    {
        // Update credit
        $userIp = $request->ip();
        $credit = Credit::where('ip', $userIp)->first();
        if ($credit) {
            $credit->credit += $amount;
            $credit->save();
        }

        // $request->session()->put('fund-amount', '0');

        toastr()->success('Payment successful!', ['timeOut' => 5000, 'closeButton' => true]);

        return redirect()->route('dashboard.index');
    }
}
