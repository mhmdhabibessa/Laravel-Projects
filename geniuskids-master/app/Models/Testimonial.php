<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Testimonial extends Model
{
    use HasTranslations;

    /**
     * List of fields that can be translatable
     * using Spatie/Translatable package
     *
     * @var string[][]
     */
    public $translatable = ['name', 'description'];
}
