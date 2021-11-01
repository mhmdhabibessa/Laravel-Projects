<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PurchaseOrder extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'discount_id', 'city_id', 'father_name', 'mother_name', 'main_contact',
        'emergency_contact', 'email', 'order_details', 'transaction_details', 'transaction_id', 'total', 'discount',
        'vat', 'grand_total', 'payment_method', 'discount_proof', 'payment_proof',
        'paid_on', 'cancelled_on', 'delivery_address'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'paid_on', 'cancelled_on'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'order_details' => 'array',
        'transaction_details' => 'array'
    ];

    /********************************************************
     * Scopes
     *********************************************************/

    /**
     * Scope a query to only include Pending confirmation
     *
     * @param $query
     * @return mixed
     */
    public function scopePending($query)
    {
        return $query->whereNull('paid_on')->whereNull('cancelled_on');
    }

    /**
     * Scope a query to only include Paid
     *
     * @param $query
     * @return mixed
     */
    public function scopePaid($query)
    {
        return $query->whereNotNull('paid_on');
    }

    /**
     * Scope a query to only include cancelled
     *
     * @param $query
     * @return mixed
     */
    public function scopeCancelled($query)
    {
        return $query->whereNotNull('cancelled_on');
    }

    /********************************************************
     * Relationships
     *********************************************************/

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function discount()
    {
        return $this->belongsTo(Discount::class);
    }

    public function income()
    {
        return $this->hasOne(Income::class);
    }

    public function students()
    {
        return $this->hasMany(Student::class);
    }

    /********************************************************
     * Mutators
     *********************************************************/
}
