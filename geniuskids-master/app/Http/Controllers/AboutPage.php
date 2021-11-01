<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class AboutPage extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param Request $request
     * @return View
     */
    public function __invoke(Request $request)
    {
        $page = Page::findOrFail(nova_page_manager_get_page_by_path('/about-us', null, app()->getLocale())['id']);
        return view('pages.about', compact('page'));
    }
}
