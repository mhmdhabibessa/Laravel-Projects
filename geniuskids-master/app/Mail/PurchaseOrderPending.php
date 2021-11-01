<?php

namespace App\Mail;

use App\Models\PurchaseOrder;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PurchaseOrderPending extends Mailable
{
    use Queueable, SerializesModels;

    public $purchaseOrder;

    /**
     * Create a new message instance.
     *
     * @param PurchaseOrder $purchaseOrder
     */
    public function __construct(PurchaseOrder $purchaseOrder)
    {
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
            ->subject(__("Your Order Is Submitted & Pending Confirmation"))
            ->markdown('emails.purchase_orders.pending')
            ->with([
                'encryptedId' => encrypt($this->purchaseOrder->id),
                'locale' => $this->locale
            ]);
    }
}
