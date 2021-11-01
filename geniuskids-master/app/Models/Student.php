<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'guardian_id', 'purchase_order_id', 'schedule_id', 'student_name', 'dob',
        'level', 'gender', 'email', 'emirates_id'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'dob'
    ];

    /********************************************************
     * Scopes
     *********************************************************/

    /********************************************************
     * Relationships
     *********************************************************/

    public function guardian()
    {
        return $this->belongsTo(Guardian::class);
    }

    public function schedule()
    {
        return $this->belongsTo(Schedule::class);
    }

    public function purchaseOrder()
    {
        return $this->belongsTo(PurchaseOrder::class);
    }

    /********************************************************
     * Mutators
     *********************************************************/
}
