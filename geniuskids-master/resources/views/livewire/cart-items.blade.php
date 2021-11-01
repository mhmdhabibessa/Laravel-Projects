<div class="border border-4 rounded shadow-2xl">
    @if(count($students) > 0)
        <div class="flex-wrap hidden w-full md:flex">
            <div class="w-2/5 p-2 font-bold text-center bg-gray-200 text-secondary">
                <span class="w-full">{{ __("Student") }}</span>
            </div>
            <div class="w-2/5 p-2 font-bold text-center bg-gray-200 text-secondary">
                <span class="w-full">{{ __("Course") }}</span>
            </div>
            <div class="w-1/5 p-2 font-bold text-center bg-gray-200 text-secondary">
                <span class="w-full">{{ __("Price") }}</span>
            </div>
        </div>
        @foreach($students as $student)
            <div class="flex flex-wrap w-full border-b border-gray-200">
                <div class="w-full p-2 text-center md:w-2/5">
                    <span class="w-full">{{ $student['name'] }}</span>
                </div>
                <div class="w-full p-2 text-center md:w-2/5">
                    <span class="w-full">{{ $student['course_title'] }}</span>
                </div>
                <div class="w-full p-2 text-center md:w-1/5">
                    <span class="w-full">{{ __("AED") }} {{ $student['price'] }}
                    <button class="px-4" wire:click="removeStudent({{ $student['id'] }})">
                        <i class="text-red-400 fad fa-times-octagon"></i>
                    </button>
                        </span>
                </div>
            </div>
        @endforeach
        <div class="flex flex-wrap w-full">
            <div class="hidden w-2/5 p-2 font-bold text-center md:flex">
            </div>
            <div class="w-1/2 p-2 font-bold text-center bg-gray-200 md:w-2/5 text-primary">
                <span class="w-full">{{ __("Total") }}</span>
            </div>
            <div class="w-1/2 p-2 font-bold text-center bg-gray-200 md:w-1/5 text-primary">
                <span class="w-full">{{ __("AED") }} {{ $total }}</span>
            </div>
        </div>
        @if($discount > 0)
            <div class="flex flex-wrap w-full">
                <div class="hidden w-2/5 p-2 font-bold text-center md:flex">
                </div>
                <div class="w-1/2 p-2 font-bold text-center bg-gray-200 md:w-2/5 text-primary">
                    <span class="w-full">{{ __("Discount") }}</span>
                </div>
                <div class="w-1/2 p-2 font-bold text-center bg-gray-200 md:w-1/5 text-primary">
                    <span class="w-full">{{ __("AED") }} {{ $discount }}</span>
                </div>
            </div>
        @endif
        <div class="flex flex-wrap w-full">
            <div class="hidden w-2/5 p-2 font-bold text-center md:flex">
            </div>
            <div class="w-1/2 p-2 font-bold text-center bg-gray-200 md:w-2/5 text-primary">
                <span class="w-full">{{ __("VAT") }} <span class="text-xs">({{ settings('vat') }}%)</span></span>
            </div>
            <div class="w-1/2 p-2 font-bold text-center bg-gray-200 md:w-1/5 text-primary">
                <span class="w-full">{{ __("AED") }} {{ $vat }}</span>
            </div>
        </div>
        <div class="flex flex-wrap w-full">
            <div class="hidden w-2/5 p-2 font-bold text-center md:flex">
            </div>
            <div class="w-1/2 p-2 font-bold text-center bg-gray-200 md:w-2/5 text-primary">
                <span class="w-full">{{ __("Grand Total") }}</span>
            </div>
            <div class="w-1/2 p-2 font-bold text-center bg-gray-200 md:w-1/5 text-primary">
                <span class="w-full">{{ __("AED") }} {{ $grandTotal }}</span>
            </div>
        </div>
        <div class="flex flex-wrap w-full">
            <div class="hidden w-2/5 p-2 font-bold text-center md:flex">
            </div>
            <div class="w-1/2 p-2 font-bold text-center bg-gray-200 md:w-2/5 text-primary">
                <span class="w-full">{{ __("Discount Card") }}</span>
            </div>
            <div class="w-1/2 p-2 font-bold text-center bg-gray-200 md:w-1/5 text-primary">
                <select wire:model.lazy="discountCard" class="form-select w-full" wire:change="refreshItems">
                    <option selected>{{ __("Select your Discount Card") }}</option>
                    @foreach($discounts as $discount)
                        <option value="{{ $discount->id }}">{{ $discount->name }} ({{ $discount->percentage }}%)</option>
                    @endforeach
                </select>
            </div>
        </div>
    @else
        <p class="my-6 text-xl font-bold text-center text-primary">
            <i class="block mx-auto mb-4 fad fa-sad-tear text-secondary fa-5x"></i>
            {{ __("You have no registered students") }}
        </p>
        <hr class="mx-auto w-1/2">
        @isset($enrollmentCourse)
            <div class="w-full text-center my-6">
                <a href="{{ route('course.show', ['course' => $enrollmentCourse]) }}" class="btn btn-primary">
                    {{ __("Click Here to Enroll in a Class") }}
                </a>
            </div>
        @endisset
    @endif
</div>
