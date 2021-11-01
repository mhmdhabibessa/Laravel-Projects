<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class VideosPage extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param Request $request
     * @return Application|Factory|Response|View
     */
    public function __invoke(Request $request)
    {
        $page = Page::findOrFail(nova_page_manager_get_page_by_path('/video-gallery', null, 'ar')['id']);

        return view('pages.videos', compact('page'));
    }
}
