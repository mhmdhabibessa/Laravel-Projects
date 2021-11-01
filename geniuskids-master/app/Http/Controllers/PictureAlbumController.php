<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\PictureAlbum;
use Illuminate\Http\Request;

class PictureAlbumController extends Controller
{
    public function index()
    {
        $page = Page::findOrFail(nova_page_manager_get_page_by_path('/pictures-gallery', null, app()->getLocale())['id']);
        $pictureAlbums = PictureAlbum::all();
        return view('picture_albums.index', compact('page', 'pictureAlbums'));
    }

    public function show(PictureAlbum $pictureAlbum)
    {
        return view('picture_albums.show', compact('pictureAlbum'));
    }
}
