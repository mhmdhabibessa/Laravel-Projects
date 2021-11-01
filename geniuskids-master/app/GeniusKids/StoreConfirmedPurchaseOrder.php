<?php

namespace App\GeniusKids;

use App\Jobs\GenerateInvoiceJob;
use App\Models\Guardian;
use App\Mail\PurchaseOrderConfirmed;
use App\Models\PurchaseOrder;
use App\Models\Schedule;
use App\Models\Student;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class StoreConfirmedPurchaseOrder
{

    /**
     * I need the money
     *
     * @param $purchaseOrderId
     * @param $paymentProof
     */
    public function handle($purchaseOrderId, $paymentProof) : void
    {
        $purchaseOrder = PurchaseOrder::findOrFail($purchaseOrderId);

        DB::transaction(function () use ($purchaseOrder, $paymentProof) {
            $guardian = Guardian::updateOrCreate(
                [
                    'main_contact' => $purchaseOrder->main_contact,
                    'email' => $purchaseOrder->email
                ],
                [
                    'city_id' => $purchaseOrder->id,
                    'father_name' => $purchaseOrder->father_name,
                    'mother_name' => $purchaseOrder->mother_name,
                    'main_contact' => $purchaseOrder->main_contact,
                    'emergency_contact' => $purchaseOrder->emergency_contact,
                    'email' => $purchaseOrder->email,
                    'delivery_address' => $purchaseOrder->delivery_address
                ]);
            //Create students
            foreach ($purchaseOrder->order_details as $detail) {
                $schedule = Schedule::findOrFail($detail['schedule_id']);
                $student = new Student();
                $student->purchase_order_id = $purchaseOrder->id;
                $student->level = $schedule->level;
                $student->schedule_id = $detail['schedule_id'];
                $student->guardian_id = $guardian->id;
                $student->name = $detail['name'];
                $student->dob = Carbon::parse($detail['dob']);
                $student->gender = $detail['gender'];
                $student->email = $detail['email'];
                $student->save();
            }
            //Update the purchase order that it was paid
            $purchaseOrder->paid_on = Carbon::now();
            $purchaseOrder->payment_proof = $paymentProof;
            $purchaseOrder->save();
            $income = $purchaseOrder->income()->create([
                'type' => 'Course Fees',
                'amount' => $purchaseOrder->grand_total,
                'vat' => $purchaseOrder->vat
            ]);
            //Generate Invoice

            GenerateInvoiceJob::dispatch($income);

            //Send confirmation email
            Mail::to($guardian->email)->locale(app()->getLocale())->queue(new PurchaseOrderConfirmed($guardian, $purchaseOrder));
        });
    }
}
