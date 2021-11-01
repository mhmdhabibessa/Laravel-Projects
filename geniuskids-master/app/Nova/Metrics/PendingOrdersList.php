<?php

namespace App\Nova\Metrics;

use App\Models\PurchaseOrder;
use ThijsSimonis\NovaListCard\NovaListCard;

class PendingOrdersList extends NovaListCard
{
    public $width = '1/2';

    public function __construct()
    {
        parent::__construct();

        $this->title('Pending Orders');

        $this->heads(['ID', 'Father Name', 'Amount', 'View']);

        $this->rows(PurchaseOrder::select('id', 'father_name', 'grand_total')
            ->pending()
            ->orderBy('created_at', 'DESC')
            ->limit(10)
            ->get()
            ->map(function ($row) {
                $row['view'] = config('nova.path') . '/resources/purchase-orders/' . $row['id'];
                return $row;
            }));
    }

    public function uriKey(): string
    {
        return 'latest-students';
    }
}
