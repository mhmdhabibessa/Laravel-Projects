@extends('app')
@section('seo')
    @include('partials.seo', [
        'meta_title' => null,
        'meta_description' => null,
        'og_title' => null,
        'og_description' => null,
    ])
@endsection
@section('content')
    <div class="container">
        @include('partials.header', ['url' => $page->getFirstMediaUrl('data->page_header_fields->page_header', 'header'),'alt' => $page->data['page_header_fields']['header_title']])
        <div class="w-full md:w-1/2 py-5">
            <h1 class="text-3xl text-primary font-bold">{{ $page->data['first_title'] }}</h1>
            <p>
                {{ $page->data['first_description'] }}
            </p>
        </div>
    </div>
    <div class="w-full mt-5 bg-gray-300 py-5">
        <div class="container flex flex-wrap">
            @foreach($page->data['content'] as $page)
                <div class="w-full md:w-1/2 md:px-10">
                    <h3 class="text-2xl text-secondary font-bold">
                        {{ $page['attributes']['title'] }}
                    </h3>
                    {!! $page['attributes']['body'] !!}
                </div>
            @endforeach
        </div>
    </div>
@endsection
