<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Page extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $appends = [
        'path'
    ];

    protected $casts = [
      'data' => 'array'
    ];

    /**
     * Registers media collections for Spatie/Media-Library package
     */
    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('page_header')
            ->singleFile();

        $this->addMediaCollection('preview_images')
            ->singleFile();

        $this->addMediaCollection('slider_images')
            ->singleFile();
    }

    /**
     * Registeres the convertions for Spatie/Media-Library package
     *
     * @param Media|null $media
     * @throws \Spatie\Image\Exceptions\InvalidManipulation
     */
    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('header')
            ->quality(90)
            ->fit(Manipulations::FIT_CROP, '1215', '400');

        $this->addMediaConversion('thumb')
            ->quality(90)
            ->fit(Manipulations::FIT_CROP, '400', '400');
    }

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->setTable('geniuskids_pages');
    }

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($template) {
            // Is a parent template
            if ($template->parent_id === null) {
                // Find child templates
                $childTemplates = Page::where('parent_id', '=', $template->id)->get();
                if (count($childTemplates) === 0) return;

                // Set their parent to null
                $childTemplates->each(function ($template) {
                    $template->update(['parent_id' => null]);
                });
            }
        });
    }

    public function parent()
    {
        return $this->belongsTo(Page::class);
    }

    public function childDraft()
    {
        return $this->hasOne(Page::class, 'draft_parent_id', 'id');
    }

    public function localeParent()
    {
        return $this->belongsTo(Page::class);
    }

    public function isDraft()
    {
        return isset($this->preview_token) ? true : false;
    }

    public function getPathAttribute()
    {
        $localeParent = $this->localeParent;
        $isLocaleChild = $localeParent !== null;
        $pathFinderPage = $isLocaleChild ? $localeParent : $this;
        if (!isset($pathFinderPage->parent)) return $this->getPagePath($this, $this->normalizePath($this->slug));

        $parentSlugs = [];
        $parent = $pathFinderPage->parent;
        while (isset($parent)) {
            if ($isLocaleChild) {
                $localizedPage = Page::where('locale_parent_id', $parent->id)->where('locale', $this->locale)->first();
                $parentSlugs[] = $localizedPage !== null ? $localizedPage->slug : $parent->slug;
            } else {
                $parentSlugs[] = $parent->slug;
            }
            $parent = $parent->parent;
        }
        $parentSlugs = array_reverse($parentSlugs);

        $normalizedPath = $this->normalizePath(implode('/', $parentSlugs) . "/" . $this->slug);

        return $this->getPagePath($this, $normalizedPath);
    }

    protected function normalizePath($path)
    {
        if (empty($path)) return null;
        if ($path[0] !== '/') $path = "/$path";
        if (strlen($path) > 1 && substr($path, -1) === '/') $path = substr($path, 0, -1);
        return preg_replace('/[\/]+/', '/', $path);
    }

    public static function getPagePath(Page $page, $path)
    {
        $getPagePath = config('nova-page-manager.page_path');
        return isset($getPagePath) ? call_user_func($getPagePath, $page, $path) : $path;
    }

    public static function getPageUrl(Page $page)
    {
        $getPageUrl = config('nova-page-manager.page_url');
        return isset($getPageUrl) ? call_user_func($getPageUrl, $page) : null;
    }
}
