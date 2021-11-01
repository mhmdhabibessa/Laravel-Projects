@extends('app')
@section('seo')
    @include('partials.seo', [
        'meta_title' => $page->data['seo_fields']['meta_title'] ,
        'meta_description' => $page->data['seo_fields']['meta_description'] ,
        'og_title' => $page->data['seo_fields']['og_title'] ,
        'og_description' => $page->data['seo_fields']['og_description'] ,
    ])
@endsection
@section('content')
    <div class="container">
        @include('partials.header', ['url' => $page->getFirstMediaUrl('data->page_header_fields->page_header', 'header'),'alt' => $page->data['page_header_fields']['header_title']])
        <h1 class="text-3xl text-primary font-bold py-5">
            {{ $page->data['page_header_fields']['header_title'] }}
        </h1>
        <div class="container">
            <div class="w-full flex flex-wrap">
                @foreach($pictureAlbums as $pictureAlbum)
                    <div class="w-1/4 p-4">
                        <a href="{{ route('picture-album.show', ['pictureAlbum' => $pictureAlbum]) }}">
                            <div class="w-full shadow-xl rounded-b-lg">
                                <img src="{{ $pictureAlbum->getFirstMediaUrl('page_header', 'thumb') }}" alt="{{ $pictureAlbum->name }}" class="rounded-t-lg">
                                <div class="p-4 text-center">
                                    <h3 class="text-lg text-primary font-bold">
                                        {{ $pictureAlbum->name }}
                                    </h3>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
