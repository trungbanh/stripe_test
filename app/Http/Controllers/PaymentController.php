<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use Stripe;
use Session;

class PaymentController extends Controller
{
    public function index()
    {
        return view('card');
    }
  
    public function makePayment(Request $request)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        Stripe\Charge::create ([
                "amount" => 120 * 100,
                "currency" => "inr",
                "source" => $request->stripeToken,
                "description" => "Make payment and chill." 
        ]);
  
        Session::flash('success', 'Payment successfully made.');
          
        return back();
    }

    public function makeSubscriptions(Request $request) {
        $request->user()->newSubscription(
            'default', 'price_premium'
        )->create($request->paymentMethodId);
    }

    public function addCard(Request $request) {

        return view('update-payment-method', [
            'intent' => $request->user()->createSetupIntent()
        ]);
    }
}
