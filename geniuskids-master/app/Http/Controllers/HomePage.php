<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Page;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HomePage extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param Request $request
     * @return View
     */
    public function __invoke(Request $request)
    {
        $page = Page::findOrFail(nova_page_manager_get_page_by_path('/', null, app()->getLocale())['id']);
        $testimonials = Testimonial::all()->random(4);
        $sliderImages = $page->getMedia('data->slider_images');
        $images = $page->getMedia('data->preview_images');
        $courses = Course::whereHas('schedules', function ($query) {
            $query->active()->available()->future();
        })->get();

        return view('pages.home', compact('page', 'testimonials', 'images', 'courses', 'sliderImages'));
    }
}
