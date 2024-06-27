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

        Stripe\Charge::create([
            "amount" => session('amount') * 100,
            "currency" => "usd",
            "source" => $request->stripeToken,
            "description" => "Test payment"
        ]);

        //update credit
        $userIp = request()->ip();
        $credit = Credit::where('ip', $userIp)->first();
        $credit->credit = $credit->credit + session('credits');
        $credit->save();

        toastr()->success('Payment successful!', ['timeOut' => 5000, 'closeButton' => true]);

        return back();
    }
}
