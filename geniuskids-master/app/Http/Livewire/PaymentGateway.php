<?php

namespace App\Http\Livewire;

use App\Models\PurchaseOrder;
use Illuminate\Support\Facades\Http;
use Livewire\Component;

class PaymentGateway extends Component
{
    public $paymentPage;

    public function mount($paymentPage)
    {
        $this->paymentPage = $paymentPage;
    }

    public function render()
    {
        return view('livewire.payment-gateway');
    }
}
