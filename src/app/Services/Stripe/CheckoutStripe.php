<?php

namespace App\Services\Stripe;

use Stripe\StripeClient;

class CheckoutStripe
{
    function __construct()
    {
        $this->stripe = new StripeClient(env('STRIPE_SECRET'));
    }

    public function paymentLink(array $products): string
    {
        return $this->stripe->checkout->sessions->create([
            'customer' => auth()->user()->stripe_id,
            'line_items' => $products,
            'shipping_address_collection' => [
                'allowed_countries' => ['ES']
            ],
            'mode' => 'payment',
            'success_url' => env('APP_URL') . '/shop',
            'cancel_url' => env('APP_URL') . '/cart',
        ])->url;
    }

    public function checkoutItems(string $id)
    {
        return $this->stripe->checkout->sessions->allLineItems($id);
    }
}
