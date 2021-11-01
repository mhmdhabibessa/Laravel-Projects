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
        <div class="w-full py-5">
            <h1 class="text-3xl text-primary font-bold">{{ __($page->data['page_header_fields']['header_title']) }}</h1>
        </div>
        <div class="w-full flex flex-wrap py-5">
            @foreach($page->data['videos'] as $video)
                <div class="w-full md:w-1/2 p-4">
                    <div class="w-full shadow-lg">
                        <iframe width="100%" height="350" src="https://www.youtube.com/embed/{{ $video['attributes']['link'] }}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
