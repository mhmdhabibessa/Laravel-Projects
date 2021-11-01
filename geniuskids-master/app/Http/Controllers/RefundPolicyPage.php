<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class RefundPolicyPage extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param Request $request
     * @return Response
     */
    public function __invoke(Request $request)
    {
        $page = Page::findOrFail(nova_page_manager_get_page_by_path('/refund-policy', null, app()->getLocale())['id']);
        return view('pages.policies', compact('page'));
    }
}
