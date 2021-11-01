@extends('app')
@section('seo')
    @include('partials.seo', [
        'meta_title' => $page->data['seo_fields']['meta_title'],
        'meta_description' => $page->data['seo_fields']['meta_description'],
        'og_title' => $page->data['seo_fields']['og_title'],
        'og_description' => $page->data['seo_fields']['og_description'],
    ])
@endsection
@section('stylesheets')
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
@endsection
@section('content')
    <div class="container flex flex-wrap">
        <div class="w-full overflow-hidden">
            @include('partials.slider')
        </div>
        <div class="py-5 w-full">
            <h1 class="text-3xl text-center font-bold text-primary mb-2">{{ $page->data['home_title'] }}</h1>
            <p class="text-center w-full md:w-2/3 mx-auto text-lg mb-2">
                {{ $page->data['home_description'] }}
            </p>
            <div class="flex flex-wrap w-full md:w-2/3 mx-auto">
                @foreach($page->data['centre_benefits'] as $page)
                    <div class="w-1/2 md:w-1/3 mx-auto text-center mb-4">
                        <a href="{{ $page['attributes']['url'] }}">
                            <img class="mx-auto" src="{{ Storage::url($page['attributes']['icon']) }}" alt="{{ $page['attributes']['title'] }}" width="100px">
                            <h3 class="text-xl text-secondary font-bold">{{ $page['attributes']['title'] }}</h3>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="container flex flex-wrap">
        @foreach($images as $image)
            <div class="w-1/2 md:w-1/6 p-2 transform
            @if($loop->iteration === 1)
                rotate-12
            @elseif($loop->iteration === 2)
                rotate-16
            @elseif($loop->iteration === 3)
                -rotate-24
            @elseif($loop->iteration === 4)
                rotate-16
            @elseif($loop->iteration === 5)
                -rotate-12
            @elseif($loop->iteration === 6)
                rotate-6
            @endif
                ">
                <img class="w-full shadow-lg" src="{{ $image->getUrl('thumb') }}" alt="Genius Kids">
            </div>
        @endforeach
    </div>
    <div class="primary-parallax py-24 w-full text-center flex flex-wrap">
        @if(count($courses) > 0)
            <div class="w-full text-center">
                <h5 class="text-3xl text-primary font-bold mb-4">{{ __('Join One of Our Courses Now!') }}</h5>
            </div>
            @foreach($courses as $course)
                <div class="w-full md:w-1/6 mx-auto p-4">
                    <a href="{{ route('course.show', ['course' => $course]) }}">
                        <div class="w-full shadow-lg bg-white">
                            <img src="{{ $course->getFirstMediaUrl('course_thumb', 'thumb') }}" alt="{{ $course->name }}">
                            <div class="py-2">
                                <span class="text-2xl text-primary font-bold">{{ $course->name }}</span>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        @else
            <div class="w-full text-center">
                <h5 class="text-3xl text-primary font-bold mb-4">{{ __("We currently don't have any courses available.") }}</h5>
            </div>
        @endif
    </div>
    <div class="container">
        <div class="flex flex-wrap">
            @foreach($testimonials as $testimonial)
                <div class="w-full md:w-1/2 p-8">
                    <blockquote>
                        {{ $testimonial->description }}
                        <cite>{{ $testimonial->name }}</cite>
                    </blockquote>
                </div>
            @endforeach
        </div>
    </div>
@endsection
@section('scripts')
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script>
        var mySwiper = new Swiper('.swiper-container', {
            spaceBetween: 30,
            direction: 'horizontal',
            loop: true,
            autoplay: {
                delay: 2500,
                disableOnInteraction: false,
            },
            pagination: {
                el: '.swiper-pagination',
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            scrollbar: {
                el: '.swiper-scrollbar',
            },
        })
    </script>
@endsection
