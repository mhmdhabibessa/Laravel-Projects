<?php

namespace App\Http\Controllers;

use App\Facades\Cart;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\Request;

class CartPage extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function __invoke(Request $request)
    {
        $students = collect(Cart::getCart()['students']);
        return view('cart.show', compact('students'));
    }
}
