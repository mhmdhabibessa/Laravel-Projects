<?php

namespace App\Jobs;

use App\Models\Income;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class GenerateInvoiceJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $income;

    public function __construct(Income $income)
    {
        $this->income = $income;
    }

    public function handle()
    {
        $purchaseOrder = $this->income->purchaseOrder;

        $pdf = \PDF::setOptions(['rootDir' => '{app_directory}/public'])
            ->setPaper('letter', 'portrait')
            ->loadView('pdf.invoice', [
            'data' => [
                'income' => $this->income,
                'order' => $purchaseOrder
            ]
        ]);

        $pdf->save(storage_path().'/app/public/invoices/'.sha1($this->income->id).'.pdf');

        $this->income->update([
            'invoice' => 'invoices/'.sha1($this->income->id).'.pdf',
        ]);
    }
}
