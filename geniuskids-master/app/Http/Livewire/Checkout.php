<?php

namespace App\Http\Livewire;

use App\Models\City;
use App\Models\Discount;
use App\Facades\Cart;
use App\Mail\PurchaseOrderPending;
use App\Models\PurchaseOrder;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;
use Livewire\WithFileUploads;

class Checkout extends Component
{
    use WithFileUploads;

    public $cities;
    //FORM START
    public $city;
    public $father_name;
    public $mother_name;
    public $main_contact;
    public $emergency_contact;
    public $payment_method = 'online';
    public $delivery_method = 'pickup';
    public $delivery_address;
    public $email;
    public $discount_card;
    //FORM END
    public $requireDiscount;

    protected $listeners = [
        'requireDiscount' => 'requireDiscount',
        'removeDiscount' => 'removeDiscount'
    ];

    public function mount()
    {
        $this->cities = City::get();
    }

    public function requireDiscount()
    {
        $this->requireDiscount = true;
    }

    public function removeDiscount()
    {
        $this->requireDiscount = false;
    }

    public function submit()
    {
        $validatedData = $this->validate([
            'city' => 'required|exists:cities,id',
            'father_name' => 'required|string|min:3|max:255',
            'mother_name' => 'required|string|min:3|max:255',
            'main_contact' => 'required|starts_with:00|numeric',
            'emergency_contact' => 'required|starts_with:00|numeric',
            'email' => 'required|email',
            'payment_method' => 'required|in:online,transfer',
            'delivery_address' => 'required_if:delivery_method,delivery'
        ]);

        $purchaseOrder = PurchaseOrder::create([
            'discount_id' => session('discount_id'),
            'city_id' => $validatedData['city'],
            'father_name' => $validatedData['father_name'],
            'mother_name' => $validatedData['mother_name'],
            'main_contact' => $validatedData['main_contact'],
            'emergency_contact' => $validatedData['emergency_contact'],
            'email' => $validatedData['email'],
            'payment_method' => $validatedData['payment_method'],
            'delivery_address' => $validatedData['delivery_address'],
            'order_details' => collect(Cart::getCart()['students']),
            'total' => session('total'),
            'discount' => session('discount'),
            'vat' => session('vat'),
            'grand_total' => session('grandTotal')
        ]);

        if ($purchaseOrder->payment_method === 'online') {

            return redirect()->to(app()->getLocale().'/payment/'.encrypt($purchaseOrder->id).'/create');

        } elseif ($purchaseOrder->payment_method === 'transfer') {

            Mail::to($purchaseOrder->email)->locale(app()->getLocale())->queue(new PurchaseOrderPending($purchaseOrder));

            return redirect()->to(app()->getLocale().'/order/'.encrypt($purchaseOrder->id));
        }
    }

    public function render()
    {
        return view('livewire.checkout');
    }
}
