@if($content->name() === 'text_description')
    <div class="w-full">
        <p>
            @if(app()->getLocale() === 'en')
                {{ $content->body_en }}
            @else
                {{ $content->body_ar }}
            @endif
        </p>
    </div>
@elseif($content->name() === 'program_phases')
    <div class="w-full mt-4 flex flex-wrap">
        <h3 class="text-xl text-primary font-bold w-full mb-2">
            {{ __('Program Phases') }}
        </h3>
            @if(app()->getLocale() === 'en')
                @foreach($content->phases_en as $key => $value)
                    @include('courses._phase')
                @endforeach
            @else
                @foreach($content->phases_ar as $key => $value)
                    @include('courses._phase')
                @endforeach
            @endif
    </div>
@elseif($content->name() === 'faqs')
    <div class="w-full md:w-1/2 mt-4 flex flex-wrap md:px-2">
        <h3 class="text-xl text-primary font-bold w-full">
            {{ __('Frequently Asked Questions') }}
        </h3>
        @if(app()->getLocale() === 'en')
            <div class="w-full" x-data="{ faqs: [
             @foreach($content->questions_en as $key => $value)
                {
                question: '{{ $key }}',
                answer: '{{ $value }}',
                isOpen: @if($loop->first) true @else false @endif
                },
            @endforeach
                ]}">
                <div class="mt-2">
                    <template x-for="faq in faqs" :key="faq.question">
                        <div class="px-1">
                            <button
                                class="w-full text-secondary font-bold border-b border-gray-400 py-3 flex justify-between items-center mt-4"
                                @click="faq.isOpen = !faq.isOpen"
                            >
                                <div x-text="faq.question" class=" text-left"></div>
                                <i x-show="!faq.isOpen" class="fad fa-plus-circle text-primary"></i>
                                <i x-show="faq.isOpen" class="fad fa-minus-circle text-primary"></i>
                            </button>
                            <div
                                class="text-sm mt-2"
                                x-text="faq.answer"
                                x-show="faq.isOpen"
                            ></div>
                        </div>
                    </template>
                </div>
            </div>
        @else
            <div class="w-full" x-data="{ faqs: [
             @foreach($content->questions_ar as $key => $value)
                {
                question: '{{ $key }}',
                answer: '{{ $value }}',
                isOpen: @if($loop->first) true @else false @endif
                },
            @endforeach
                ]}">
                <div class="mt-2">
                    <template x-for="faq in faqs" :key="faq.question">
                        <div class="px-1">
                            <button
                                class="w-full text-secondary font-bold border-b border-gray-400 py-3 flex justify-between items-center mt-4"
                                @click="faq.isOpen = !faq.isOpen"
                            >
                                <div x-text="faq.question" class="text-right"></div>
                                <i x-show="!faq.isOpen" class="fad fa-plus-circle text-primary"></i>
                                <i x-show="faq.isOpen" class="fad fa-minus-circle text-primary"></i>
                            </button>
                            <div
                                class="text-sm mt-2"
                                x-text="faq.answer"
                                x-show="faq.isOpen"
                            ></div>
                        </div>
                    </template>
                </div>
            </div>
        @endif
    </div>
@elseif($content->name() === 'benefits')
    <div class="w-full md:w-1/2 mt-4">
        <h3 class="text-xl text-primary font-bold">
            {{ __('Program Benefits') }}
        </h3>
        @if(app()->getLocale() === 'en')
            <div class="w-full md:px-2" x-data="{ tab: '1' }">
                <ul class="flex border-b mt-6 list-none" >
                    @foreach($content->benefits_en as $key => $value)
                        <li class="-mb-px mr-1">
                            <a
                                class="inline-block rounded-t py-1 px-1 font-semibold text-primary hover:text-green-700"
                                :class="{ 'bg-white text-secondary border-l border-t border-r' : tab === '{{ $loop->iteration }}' }"
                                @click.prevent="tab = '{{ $loop->iteration }}'"
                                href="#"
                            >{{ $key }}</a>
                        </li>
                    @endforeach
                </ul>
                <div class="content bg-white px-4 py-4 border-l border-r border-b pt-4">
                    @foreach($content->benefits_en as $key => $value)
                        <div x-show="tab === '{{ $loop->iteration }}'">
                            {{ $value }}
                        </div>
                    @endforeach
                </div>
            </div>
        @else
            <div class="w-full md:px-2" x-data="{ tab: '1' }">
                <ul class="flex border-b mt-6 list-none" >
                    @foreach($content->benefits_ar as $key => $value)
                        <li class="-mb-px mr-1">
                            <a
                                class="inline-block rounded-t py-1 px-1 font-semibold text-primary hover:text-green-700"
                                :class="{ 'bg-white text-secondary border-l border-t border-r' : tab === '{{ $loop->iteration }}' }"
                                @click.prevent="tab = '{{ $loop->iteration }}'"
                                href="#"
                            >{{ $key }}</a>
                        </li>
                    @endforeach
                </ul>
                <div class="content bg-white px-4 py-4 border-l border-r border-b pt-4">
                    @foreach($content->benefits_ar as $key => $value)
                        <div x-show="tab === '{{ $loop->iteration }}'">
                            {{ $value }}
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
    </div>
@endif
