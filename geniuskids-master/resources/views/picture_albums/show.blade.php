@extends('app')
@section('seo')
    @include('partials.seo', [
        'meta_title' => $pictureAlbum->meta_title,
        'meta_description' => $pictureAlbum->meta_description,
        'og_title' => $pictureAlbum->og_title,
        'og_description' => $pictureAlbum->og_description,
    ])
@endsection
@section('content')
    <div class="container">
        @include('partials.header', ['url' => $pictureAlbum->getFirstMediaUrl('page_header', 'header'),'alt' => $pictureAlbum->name])
        <h1 class="text-3xl text-primary font-bold py-5">{{ $pictureAlbum->name }}</h1>
        <div class="w-full flex flex-wrap mb-5">
            <div class="w-full md:w-2/3 mx-auto" x-data="{ image: '0' }">
                <div>
                    @foreach($pictureAlbum->getMedia('album_images') as $image)
                        <img src="{{ $image->getUrl('preview')  }}" alt="{{ $pictureAlbum->name }}" x-show="image === '{{ $loop->index }}'">
                    @endforeach
                </div>
                <div class="flex flex-wrap mt-4">
                    @foreach($pictureAlbum->getMedia('album_images') as $image)
                        <a href="#" class="border border-transparent hover:border-primary w-1/12" @click.prevent="image = '{{ $loop->index }}'">
                            <img src="{{ $image->getUrl('thumb')  }}" alt="{{ $pictureAlbum->name }}">
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
