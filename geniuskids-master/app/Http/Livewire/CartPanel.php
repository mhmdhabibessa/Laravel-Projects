<?php

namespace App\Http\Livewire;

use App\Facades\Cart;
use Livewire\Component;

class CartPanel extends Component
{
    public $cart;

    protected $listeners = ['itemAdded' => 'mount'];

    public function mount(): void
    {
        $this->cart = Cart::getCart();
    }

    public function render()
    {

        $cartCount = count($this->cart['students']);

        return view('livewire.cart-panel', [
            'cartCount' => $cartCount
        ]);
    }
}
