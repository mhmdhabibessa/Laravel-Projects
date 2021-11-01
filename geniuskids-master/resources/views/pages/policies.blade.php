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
            <h1 class="text-3xl text-primary font-bold">{{ $page->data['page_header_fields']['header_title'] }}</h1>
        </div>
        <div class="w-full py-5">
            {!! $page->data['content'] !!}
        </div>
    </div>
@endsection
