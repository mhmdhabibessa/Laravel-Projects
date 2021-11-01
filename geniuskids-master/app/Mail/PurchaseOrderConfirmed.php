<?php

namespace App\Mail;

use App\Models\Guardian;
use App\Models\PurchaseOrder;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PurchaseOrderConfirmed extends Mailable
{
    use Queueable, SerializesModels;

    protected $guardian;
    protected $purchaseOrder;

    /**
     * Create a new message instance.
     *
     * @param Guardian $guardian
     * @param PurchaseOrder $purchaseOrder
     */
    public function __construct(Guardian $guardian, PurchaseOrder $purchaseOrder)
    {
        $this->guardian = $guardian;
        $this->purchaseOrder = $purchaseOrder;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        return $this
            ->from('noreply@geniuskids.ae', __("Genius Kids"))
            ->bcc('accounts@geniuskids.ae')
            ->subject(__("Your Order is Confirmed"))
            ->markdown('emails.purchase_orders.confirmed')
            ->with([
                'fatherName' => $this->guardian->father_name,
                'motherName' => $this->guardian->mother_name,
                'mainContact' => $this->guardian->main_contact,
                'emergencyContact' => $this->guardian->emergency_contact,
                'guardianEmail' => $this->guardian->email,
                'students' => $this->guardian->students,
                'total' => $this->purchaseOrder->total,
                'discount' => $this->purchaseOrder->discount,
                'grandTotal' => $this->purchaseOrder->grand_total,
                'vat' => $this->purchaseOrder->vat,
                'paymentMethod' => $this->purchaseOrder->payment_method
            ]);
    }
}
