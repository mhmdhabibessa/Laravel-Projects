@extends('app')
@section('content')
    <div class="container flex flex-wrap">
        <div class="w-full">
            @if($purchaseOrder->transaction_details['ResponseCode'] === '0')
                <h1 class="py-5 text-3xl font-bold text-primary">{{ __("Payment Successful")  }}</h1>
            @else
                <h1 class="py-5 text-3xl font-bold text-primary">{{ __("We Couldn't Process Your Payment")  }}</h1>
            @endif
        </div>
        <div class="w-full p-4 bg-gray-200 md:w-1/2 mb-8">
            <ul class="list-none">
                <li class="py-2">
                    {{ __("Father Name") }}: <strong>{{ $purchaseOrder->father_name }}</strong>
                </li>
                <li class="py-2">
                    {{ __("Mother Name") }}: <strong>{{ $purchaseOrder->mother_name }}</strong>
                </li>
                <li class="py-2">
                    {{ __("Main Contact Mobile") }}: <strong>{{ $purchaseOrder->main_contact }}</strong>
                </li>
                <li class="py-2">
                    {{ __("Emergency Contact Mobile") }}: <strong>{{ $purchaseOrder->emergency_contact }}</strong>
                </li>
                <li class="py-2">
                    {{ __("Email") }}: <strong>{{ $purchaseOrder->email }}</strong>
                </li>
                <li class="py-2">
                    {{ __("Order Details") }}
                </li>
            </ul>
            <hr class="border-t-2 border-white">
            @foreach($purchaseOrder->order_details as $student)
                <div class="flex flex-wrap w-full border-b border-gray-200">
                    <div class="w-full p-2 text-center md:w-2/5">
                        <span class="w-full">{{ $student['name'] }}</span>
                    </div>
                    <div class="w-full p-2 text-center md:w-2/5">
                        <span class="w-full">{{ $student['course_title'] }}</span>
                    </div>
                    <div class="w-full p-2 text-center md:w-1/5">
                        <span class="w-full">{{ __("AED") }} {{ $student['price'] }}</span>
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
                    <span class="w-full">{{ __("AED") }} {{ $purchaseOrder->total }}</span>
                </div>
            </div>
            @if($purchaseOrder->discount > 0)
                <div class="flex flex-wrap w-full">
                    <div class="hidden w-2/5 p-2 font-bold text-center md:flex">
                    </div>
                    <div class="w-1/2 p-2 font-bold text-center bg-gray-200 md:w-2/5 text-primary">
                        <span class="w-full">{{ __("Discount") }}</span>
                    </div>
                    <div class="w-1/2 p-2 font-bold text-center bg-gray-200 md:w-1/5 text-primary">
                        <span class="w-full">{{ __("AED") }}  {{ $purchaseOrder->discount }}</span>
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
                    <span class="w-full">{{ __("AED") }} {{ $purchaseOrder->vat }}</span>
                </div>
            </div>
            <div class="flex flex-wrap w-full">
                <div class="hidden w-2/5 p-2 font-bold text-center md:flex">
                </div>
                <div class="w-1/2 p-2 font-bold text-center bg-gray-200 md:w-2/5 text-primary">
                    <span class="w-full">{{ __("Grand Total") }}</span>
                </div>
                <div class="w-1/2 p-2 font-bold text-center bg-gray-200 md:w-1/5 text-primary">
                    <span class="w-full">{{ __("AED") }} {{ $purchaseOrder->grand_total }}</span>
                </div>
            </div>
        </div>
        <div class="flex flex-wrap w-full p-4 md:w-1/2">
            @foreach($students as $student)
                <div class="w-full py-4">
                    <div class="rounded-lg shadow-lg p-4">
                        <ul class="list-none">
                            <li>
                                <strong>{{ __("Student Name") }}: </strong>{{ $student->name }}
                            </li>
                            <li>
                                <strong>{{ __("Date of Birth") }}: </strong>{{ $student->dob->format('d-M-Y') }}
                            </li>
                            <li>
                                <strong>{{ __("Class Timings") }}:</strong>
                                <ul class="px-8 ">
                                    @foreach($student->schedule->days_of_week as $slot)
                                        <li>
                                            <span class="text-primary font-bold">{{ __($slot['attributes']['day']) }}:</span>
                                            <span>{{ Str::replaceLast(':00', '', $slot['attributes']['starting_time']) }}</span>
                                            <span>-</span>
                                            <span>{{ Str::replaceLast(':00', '', $slot['attributes']['ending_time']) }}</span>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
