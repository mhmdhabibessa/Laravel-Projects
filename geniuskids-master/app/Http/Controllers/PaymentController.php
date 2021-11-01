<?php

namespace App\Http\Controllers;

use App\GeniusKids\StoreConfirmedPurchaseOrder;
use App\Models\PurchaseOrder;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use Symfony\Component\HttpKernel\HttpCache\HttpCache;

class PaymentController extends Controller
{
    public function create($id)
    {
        $purchaseOrder = PurchaseOrder::find(decrypt($id));

        $paymentPage = Http::withHeaders(['Accept' => 'application/json'])
            ->post(settings('api_endpoint'), [
            'Registration' => [
                'Currency' => 'AED',
                'ReturnPath' => route('payment.update'),
                'TransactionHint' => 'CPT:Y;VCC:Y;',
                'OrderID' => $purchaseOrder->id,
                'Channel' => 'Web',
                'Amount' => $purchaseOrder->grand_total,
                'Customer' => settings('customer'),
                'OrderName' => 'Course Registration',
                'OrderInfo' => 'Course Registration Fees',
                'UserName' => settings('username'),
                'Password' => settings('password')
            ]
        ])->json();

        $purchaseOrder->update([
            'transaction_id' => $paymentPage['Transaction']['TransactionID']
        ]);

        return view('payment.create', compact('paymentPage', 'purchaseOrder'));
    }

    public function show($id)
    {
        $purchaseOrder = PurchaseOrder::findOrFail(decrypt($id));
        $students = $purchaseOrder->students;

        return view('payment.show', compact('purchaseOrder', 'students'));
    }

    public function update()
    {
        $finalization = Http::withHeaders(['Accept' => 'application/json'])
            ->post(settings('api_endpoint'), [
                'Finalization' => [
                    'TransactionID' => request('TransactionID'),
                    'Customer' => settings('customer'),
                    'UserName' => settings('username'),
                    'Password' => settings('password')
                ]
            ])->json()['Transaction'];

        $purchaseOrder = PurchaseOrder::where('transaction_id', request('TransactionID'))->first();

        $purchaseOrder->transaction_details = $finalization;

        if ($finalization['ResponseCode'] === '0') {

            $purchaseOrder->paid_on = Carbon::now();
//            $purchaseOrder->save();
            (new StoreConfirmedPurchaseOrder())->handle($purchaseOrder->id, null);

        }
        $purchaseOrder->save();

        return redirect()->route('payment.show', ['id' => encrypt($purchaseOrder->id)]);
    }
}
