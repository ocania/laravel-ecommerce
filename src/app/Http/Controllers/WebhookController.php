<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Order_Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Cookie;
use Laravel\Cashier\Http\Controllers\WebhookController as CashierWebhookController;

class WebhookController extends CashierWebhookController
{
    public function handleCheckoutSessionCompleted($payload)
    {
        Cookie::forget('cart');

        if ($user = $this->getUserByStripeId($payload['data']['object']['customer'])) {
            $order = Order::create(['user_id' => $user->id]);

            //$payload['data']['object']['id'];

            Order_Product::create([
                'order_id' => $order->id,
                'product_id' => 'id',
                'quantity' => 'a',
            ]);
        }
    }
}
