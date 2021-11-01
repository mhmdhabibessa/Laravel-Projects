<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Guardian extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'city_id', 'father_name', 'mother_name', 'main_contact',
        'emergency_contact', 'email', 'delivery_address'
    ];

    /********************************************************
     * Scopes
     *********************************************************/

    /********************************************************
     * Relationships
     *********************************************************/

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function students()
    {
        return $this->hasMany(Student::class);
    }

    /********************************************************
     * Mutators
     *********************************************************/
}
