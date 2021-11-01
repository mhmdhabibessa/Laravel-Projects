<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Image\Exceptions\InvalidManipulation;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\Translatable\HasTranslations;

class PictureAlbum extends Model implements HasMedia
{
    use InteractsWithMedia, HasTranslations;

    /**
     * List of fields that can be trasnlatable
     * using Spatie/Translatable package
     *
     * @var string[][]
     */
    public $translatable = ['name'];

    /**
     * Registers media collections for Spatie/Media-Library package
     */
    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('page_header')
            ->singleFile();

        $this->addMediaCollection('album_images');
    }

    /**
     * Registers the conversions for Spatie/Media-Library package
     *
     * @param Media|null $media
     * @throws InvalidManipulation
     */
    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('header')
            ->quality(90)
            ->fit(Manipulations::FIT_CROP, '1215', '400');

        $this->addMediaConversion('thumb')
            ->quality(90)
            ->fit(Manipulations::FIT_CROP, '400', '400');

        $this->addMediaConversion('preview')
            ->quality(90)->width('1024');
    }
}
