@extends('app')
@section('seo')
    @include('partials.seo', [
        'meta_title' => $course->meta_title,
        'meta_description' => $course->meta_description,
        'og_title' => $course->og_title,
        'og_description' => $course->og_description,
    ])
@endsection
@section('stylesheets')
    <link rel="stylesheet" href="/css/flatpickr.min.css">
@endsection
@section('content')
    <div class="container">
        @include('partials.header', ['url' => $course->getFirstMediaUrl('page_header', 'header'),'alt' => $course->name])
        <h1 class="text-3xl text-primary font-bold py-5">{{ $course->name }}</h1>
        <div class="w-full flex flex-wrap-reverse md:flex-wrap">
            <div class="w-full md:w-2/3 flex flex-wrap">
                @foreach($course->content as $content)
                    @include('courses._content')
                    @if($loop->index === 1)
                        <div class="w-full flex flex-wrap py-6">
                            @foreach($course->getMedia('featured_images') as $image)
                                <div class="w-1/2 md:w-1/4 p-2">
                                    <div class="shadow-xl p-3">
                                        <img src="{{ $image->getUrl('thumb') }}" alt="{{ $course->name }}">
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                @endforeach
            </div>
            @if($course->schedules()->active()->future()->exists())
                <div class="w-full md:w-1/3 px-0 md:px-4 my-4 md:my-0">
                    <div class="w-full flex flex-wrap shadow-lg rounded-lg content-start">
                        <div class="w-full">
                            <h3 class="text-3xl text-secondary font-bold w-full text-center py-4">
                                {{ __('Available Classes') }}
                            </h3>
                        </div>
                        @foreach($course->schedules()->active()->future()->get() as $schedule)
                            <div class="w-full px-2">
                                <p class="mb-1">
                                    <span class="text-primary font-bold">{{ __("Level") }}:</span>
                                    {{ __("Level") }} {{ $schedule->level }}
                                </p>
                                <p class="mb-1">
                                    <span class="text-primary font-bold">{{ __("Price") }}:</span>
                                    {{ __("AED") }} {{ $schedule->price }}
                                </p>
                                <p class="mb-1">
                                    <span class="text-primary font-bold">{{ __("Starting Date") }}:</span>
                                    <span class="ltr">
                                    {{ $schedule->starts_on->format('d-m-Y') }}
                                    </span>
                                </p>
                                <p class="mb-1">
                                    <span class="text-primary font-bold">{{ __("Ending Date") }}:</span>
                                    <span class="ltr">
                                    {{ $schedule->ends_on->format('d-m-Y') }}
                                    </span>
                                </p>
                                <p>
                                    <span class="text-primary font-bold">{{ __("Class Timings") }}:</span>
                                </p>
                                @foreach($schedule->days_of_week as $slot)
                                    <div class="px-2" >
                                        <span class="text-secondary font-bold">{{ __($slot['attributes']['day']) }}:</span>
                                        <span>{{ Str::replaceLast(':00', '', $slot['attributes']['starting_time']) }}</span>
                                        <span>-</span>
                                        <span>{{ Str::replaceLast(':00', '', $slot['attributes']['ending_time']) }}</span>
                                    </div>
                                @endforeach
                                <livewire:register-student :schedule="$schedule" />
                            </div>
                            <hr class="border-b border-primary w-1/2 mx-auto my-2">
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
@section('scripts')
    <script src="/js/flatpickr.min.js"></script>
@endsection
