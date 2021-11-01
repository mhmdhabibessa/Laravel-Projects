<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $fillable = [
        'guardian_id', 'total', 'vat', 'grand_total', 'paid'
    ];

    /********************************************************
     * Scopes
     *********************************************************/

    /********************************************************
     * Relationships
     *********************************************************/

    public function invoice()
    {
        return $this->belongsTo(Invoice::class);
    }

    /********************************************************
     * Mutators
     *********************************************************/
}
