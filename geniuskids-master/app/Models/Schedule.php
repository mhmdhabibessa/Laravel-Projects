<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Whitecube\NovaFlexibleContent\Value\FlexibleCast;

class Schedule extends Model
{
    use HasTranslations;

    /**
     * List of fields that can be trasnlatable
     * using Spatie/Translatable package
     *
     * @var string[][]
     */
    public $translatable = ['name', 'description'];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'starts_on', 'ends_on', 'min_dob', 'max_dob'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
//        'days_of_week' => FlexibleCast::class
        'days_of_week' => 'array'
    ];
    /********************************************************
     * Scopes
     ********************************************************

    /*
     * @param $query
     */
    public function scopeActive($query)
    {
        $query->where('active', 1);
    }

    public function scopeAvailable($query)
    {
        $query->whereColumn('max_students', '>', 'booked_students');
    }

    public function scopeFuture($query)
    {
        $query->where('starts_on', '>=', Carbon::now());
    }

    /********************************************************
     * Relationships
     *********************************************************/

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function students()
    {
        return $this->hasMany(Student::class);
    }

    /********************************************************
     * Mutators
     *********************************************************/
}
