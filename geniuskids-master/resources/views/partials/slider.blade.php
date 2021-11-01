{{--@foreach($sliderImages as $image)--}}
{{--    <div class="embla__slide">--}}

{{--    </div>--}}
{{--@endforeach--}}
<div class="swiper-container">
    <div class="swiper-wrapper">
        @foreach($sliderImages as $image)
            <div class="swiper-slide">
                <img class="w-full" src="{{ $image->getUrl('header') }}" />
            </div>
        @endforeach
    </div>
    <div class="swiper-pagination"></div>
    <div class="swiper-button-prev"></div>
    <div class="swiper-button-next"></div>
</div>
