<?php


namespace App\Services;


use App\Models\Cart;
use Illuminate\Support\Facades\Cookie;

class CartServices
{
    public function getFromCookieOrCreate()
    {
        $cartId = Cookie::get('cart');
        $cart = Cart::find($cartId);

        return $cart ?? Cart::create();
    }

}
