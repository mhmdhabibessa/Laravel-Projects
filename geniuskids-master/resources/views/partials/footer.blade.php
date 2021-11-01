<div class="border-t-4 border-primary py-4 bg-gray-200">
    <div class="container flex flex-wrap">
        <div class="w-full md:w-1/3">
            <h4 class="font-bold text-secondary text-xl">
                {{ __("Genius Kids") }}
            </h4>
            <ul class="list-disc list-outside mx-4">
                <li>
                    <a href="{{ route('about') }}" class="link-primary">
                        {{ __('About Us') }}
                    </a>
                </li>
                <li>
                    <a href="{{ route('terms-and-conditions') }}" class="link-primary">
                        {{ __('Terms & Conditions') }}
                    </a>
                </li>
                <li>
                    <a href="{{ route('refund-policy') }}" class="link-primary">
                        {{ __('Refund Policy') }}
                    </a>
                </li>
                <li>
                    <a href="{{ route('privacy') }}" class="link-primary">
                        {{ __('Privacy Policy') }}
                    </a>
                </li>
            </ul>
        </div>
        <div class="w-full md:w-1/3">
            <h4 class="font-bold text-secondary text-xl">
                {{ __("Courses") }}
            </h4>
            <ul class="list-disc list-outside mx-4">
                @foreach($navCourses as $course)
                    <li>
                        <a href="{{ route('course.show', ['course' => $course]) }}" class="link-primary">
                            {{ $course->name }}
                        </a>
                    </li>
                @endforeach
            </ul>
            <h4 class="font-bold text-secondary text-xl mt-2">
                {{ __("Follow Us") }}
            </h4>
            <ul class="list-none">
                <li class="inline mx-2">
                    <a href="{{ settings('facebook_link') }}">
                        <i class="fab fa-facebook-square fa-2x text-primary"></i>
                    </a>
                </li>
                <li class="inline mx-2">
                    <a href="{{ settings('instagram_link') }}">
                        <i class="fab fa-instagram fa-2x text-primary"></i>
                    </a>
                </li>
                <li class="inline mx-2">
                    <a href="{{ settings('youtube_link') }}">
                        <i class="fab fa-youtube fa-2x text-primary"></i>
                    </a>
                </li>
                <li class="inline mx-2">
                    <a href="{{ settings('twitter_link') }}">
                        <i class="fab fa-twitter fa-2x text-primary"></i>
                    </a>
                </li>
                <li class="inline mx-2">
                    <a href="{{ settings('snapchat_link') }}">
                        <i class="fab fa-snapchat fa-2x text-primary"></i>
                    </a>
                </li>
            </ul>
            <h4 class="font-bold text-secondary text-xl mt-2">
                {{ __("Contact Us") }}
            </h4>
            <ul class="list-none">
                <li class="mx-2">
                    {{ __(settings('address')) }}
                </li>
                <li class="mx-2">
                    <a href="tel:{{ settings('call_link') }}">
                        <i class="fad fa-phone-square-alt fa-2x text-primary"></i> <span>{{ settings('call_link') }}</span>
                    </a>
                </li>
                <li class="mx-2">
                    <a href="mailto:{{ settings('email_link') }}">
                        <i class="fad fa-envelope-square fa-2x text-primary"></i> {{ settings('email_link') }}
                    </a>
                </li>
                @if(settings('whatsapp_link') != null)
                <li class="mx-2">
                    <a href="{{ settings('whatsapp_link') }}">
                        <i class="fab fa-whatsapp-square fa-2x text-primary"></i>
                    </a>
                </li>
                @endif
            </ul>
        </div>
        <div class="w-full flex flex-wrap md:w-1/3">
            <div class="w-full">
                <h4 class="font-bold text-secondary text-xl">
                    {{ __("Accreditations") }}
                </h4>
            </div>
            <div class="w-2/3 px-2">
                <img src="/wamas-logo.png" class="mb-4 w-full" alt="WAMAS">
            </div>
            <div class="w-1/3 px-2">
                <img src="/cgctc-logo.png" class="mb-4 w-full" alt="Canada Global Centre Consulting and Training">
            </div>
            <div class="w-full">
                <h4 class="font-bold text-secondary text-xl">
                    {{ __("Accepted Cards") }}
                </h4>
                <img src="/accepted-cards.png" alt="Online Payment Genius Kids Centre">
            </div>
        </div>
    </div>
</div>
<div class="bg-gray-300 w-full text-center py-4">
    <span class="text-gray-600 text-sm block">{{ __('All Rights Reserved') }} &copy; {{ date('Y') }} - <a href="{{ env('APP_URL') }}">geniuskids.ae</a></span>
    <span class="block text-xs text-gray-600">by: <a href="https://www.theaustrians.ae/">theaustrians.ae</a></span>
</div>
<script src="{{ mix('js/app.js') }}"></script>
<script src="https://kit.fontawesome.com/520e24db23.js" crossorigin="anonymous"></script>
