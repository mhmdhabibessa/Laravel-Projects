<?php

namespace App\Http\Livewire;

use App\Models\Course;
use App\Models\Discount;
use App\Facades\Cart;
use Livewire\Component;

class CartItems extends Component
{
    public $students;
    public $total;
    public $discountable;
    public $totalAfterDiscount;
    public $vat;
    public $grandTotal;
    public $discount;
    public $discountCard;
    public $discounts;
    public $enrollmentCourse;

    public function mount()
    {
        $this->refreshItems();
        $this->enrollmentCourse = Course::find(settings('enrollment'));
        $this->discounts = Discount::all();
    }

    public function removeStudent($id)
    {
        Cart::remove($id);
        $this->refreshItems();
    }

    public function refreshItems()
    {
        $this->students = collect(Cart::getCart()['students']);
        $this->total = $this->students->sum('price');
        $this->discountable = $this->students->sum('discountable');
        $this->vat = $this->total * 0.05;
        $this->grandTotal = $this->total * 1.05;
        $this->discountManager();
    }

    public function discountManager()
    {
        session(['discount_id' => null]);
        $discount = Discount::find($this->discountCard);
        $this->discount = 0;
        if (isset($this->discountCard) && isset($discount)) {
            $this->discount = $this->discountable * ($discount->percentage / 100);
            session(['discount_id' => $discount->id]);
        } elseif (count($this->students) >= 2) {
            session(['discount_id' => null]);
            $this->discount = $this->discountable * (settings('siblings_discount') / 100);
        }
        $this->totalAfterDiscount = $this->total - $this->discount;
        $this->vat = $this->totalAfterDiscount * 0.05;
        $this->grandTotal = $this->totalAfterDiscount * 1.05;
        session([
            'discount' => $this->discount,
            'total' => $this->totalAfterDiscount,
            'vat' => $this->vat,
            'grandTotal' => $this->grandTotal
        ]);
        if (isset($discount)) {
            $this->emit('requireDiscount');
        } elseif (!isset($discount)) {
            $this->emit('removeDiscount');
        }
    }

    public function render()
    {
        return view('livewire.cart-items');
    }
}
