<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;

class PrivacyPolicyPage extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $page = Page::findOrFail(nova_page_manager_get_page_by_path('/privacy-policy', null, app()->getLocale())['id']);
        return view('pages.policies', compact('page'));
    }
}
