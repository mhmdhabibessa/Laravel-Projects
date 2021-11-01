<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Income extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['purchase_order_id', 'type', 'amount', 'vat', 'invoice'];

    /********************************************************
     * Scopes
     *********************************************************/

    /********************************************************
     * Relationships
     *********************************************************/

    public function purchaseOrder()
    {
        return $this->belongsTo(PurchaseOrder::class);
    }

    /********************************************************
     * Mutators
     *********************************************************/
}
