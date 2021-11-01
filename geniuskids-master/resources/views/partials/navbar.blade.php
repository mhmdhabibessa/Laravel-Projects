<div x-show="open === true" class="w-full bg-white sticky top-0 left-0 z-50 border-b-4 border-primary ltr">
    <div x-data="{ open: false }" class="flex flex-col max-w-screen-xl px-4 mx-auto md:items-center md:justify-between md:flex-row md:px-6 lg:px-8">
        <div class="flex flex-row items-center justify-between p-4">
            <a href="{{ route('home') }}" class="text-xl font-bold text-primary font-cursive">
                <img src="/logo.png" alt="" width="120px">
            </a>
            <button class="rounded-lg md:hidden focus:outline-none focus:-outline" @click="open = !open">
                <svg fill="#303960" viewBox="0 0 20 20" class="w-6 h-6">
                    <path x-show="!open" fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM9 15a1 1 0 011-1h6a1 1 0 110 2h-6a1 1 0 01-1-1z" clip-rule="evenodd" style="display: none;"></path>
                    <path x-show="open" fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                </svg>
            </button>
        </div>
        <nav :class="{'flex': open, 'hidden': !open}" class="flex-col flex-grow pb-4 md:pb-0 md:flex md:justify-end md:flex-row flex">
            <a href="{{ route('home') }}" class="nav-link font-bold {{ Route::is('home') ? 'active' : '' }}">
                {{ __('Home') }}
            </a>
            @isset($navCourses)
            <div @click.away="open = false" class="relative" x-data="{ open: false }">
                <button @click="open = !open" class="flex flex-row items-center w-full nav-link {{ Route::is('courses.*') ? 'active' : '' }}">
                    <span class="font-bold">{{ __('Courses') }}</span>
                    <svg fill="#303960" viewBox="0 0 20 20" :class="{'rotate-180': open, 'rotate-0': !open}" class="inline w-4 h-4 mt-1 ml-1 transition-transform duration-200 transform rotate-0">
                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                    </svg>
                </button>
                <div x-show="open"
                     x-transition:enter="transition ease-out duration-100"
                     x-transition:enter-start="transform opacity-0 scale-95"
                     x-transition:enter-end="transform opacity-100 scale-100"
                     x-transition:leave="transition ease-in duration-75"
                     x-transition:leave-start="transform opacity-100 scale-100"
                     x-transition:leave-end="transform opacity-0 scale-95"
                     class="absolute right-0 w-full mt-2 origin-top-right bg-white md:w-48 z-30"
                     style="display: none;">
                    <div class="px-2 py-2 bg-white {{ app()->getLocale() }}">
                        @foreach($navCourses as $course)
                            <a class="dropdown-link" href="{{ route('course.show', ['course' => $course]) }}">
                                {{ $course->name }}
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
            @endisset
            <div @click.away="open = false" class="relative" x-data="{ open: false }">
                <button @click="open = !open" class="flex flex-row items-center w-full nav-link {{ Route::is('picture-album.*') ? 'active' : '' }}">
                    <span class="font-bold">{{ __('Gallery') }}</span>
                    <svg fill="#303960" viewBox="0 0 20 20" :class="{'rotate-180': open, 'rotate-0': !open}" class="inline w-4 h-4 mt-1 ml-1 transition-transform duration-200 transform rotate-0">
                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                    </svg>
                </button>
                <div x-show="open"
                     x-transition:enter="transition ease-out duration-100"
                     x-transition:enter-start="transform opacity-0 scale-95"
                     x-transition:enter-end="transform opacity-100 scale-100"
                     x-transition:leave="transition ease-in duration-75"
                     x-transition:leave-start="transform opacity-100 scale-100"
                     x-transition:leave-end="transform opacity-0 scale-95"
                     class="absolute right-0 w-full mt-2 origin-top-right bg-white md:w-48 z-30"
                     style="display: none;">
                    <div class="px-2 py-2 bg-white {{ app()->getLocale() }}">
                            <a class="dropdown-link" href="{{ route('picture-album.index') }}">
                                {{ __("Pictures") }}
                            </a>
                        <a class="dropdown-link" href="{{ route('videos') }}">
                            {{ __("Videos") }}
                        </a>
                    </div>
                </div>
            </div>
            <a href="{{ route('about') }}" class="nav-link font-bold {{ Route::is('about') ? 'active' : '' }}">
                {{ __('About') }}
            </a>
            @isset($course)
                <a href="{{ route('course.show', ['course' => $course]) }}" class="nav-link font-bold border-secondary border-4 {{ Route::is('courses.*') ? 'active' : '' }}">
                    {{ __('Enroll Now') }}
                </a>
            @endisset
            @foreach (config('app.locales') as $localeKey => $locale)
                @if ($localeKey != app()->getLocale())
                    <a class="nav-link font-bold" href="{{ route('locale.switch', $localeKey) }}">
                        {{ Str::upper($localeKey) }}
                    </a>
                @endif
            @endforeach
        </nav>
    </div>
</div>
