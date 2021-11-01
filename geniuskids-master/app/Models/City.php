<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class City extends Model
{
    use HasTranslations;

    /**
     * List of fields that can be trasnlatable
     * using Spatie/Translatable package
     *
     * @var string[][]
     */
    public $translatable = ['name'];

    /********************************************************
     * Scopes
     *********************************************************/

    /********************************************************
     * Relationships
     *********************************************************/

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    /********************************************************
     * Mutators
     *********************************************************/
}
