<?php


namespace App\Services;


use App\Models\Cart;
use Illuminate\Support\Facades\Cookie;

class CartServices
{
    protected $cookieName;
    protected $cookieExpiration;


    public function getFromCookieOrCreate()
    {

        $cart = $this->getFromCookie();

        return $cart ?? Cart::create();
    }

    public function getFromCookie()
    {

        $cartId = Cookie::get($this->cookieName);

        $cart = Cart::find($cartId);

        return $cart;
    }

    public function makeCookie(Cart $cart)
    {
        return Cookie::make($this->cookieName, $cart->id, $this->cookieExpiration);
    }

    public function countProducts()
    {
        $cart = $this->getFromCookie();

        if ($cart != null) {
            return $cart->products->pluck('pivot.quantity')->sum();
        }

        return 0;
    }

}
