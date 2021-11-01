@extends('app')

@section('content')
    <div class="container flex flex-wrap">
        <div class="w-full">
            <h1 class="py-5 text-3xl font-bold text-primary">{{ __("Purchase Order Pending Payment")  }}</h1>
        </div>
        <div class="flex flex-wrap w-full mb-4">
            <div class="w-full md:w-1/2 p-4">
                <livewire:payment-gateway :payment-page="$paymentPage"/>
            </div>
            <div class="w-full md:w-1/2 p-4 bg-gray-200">
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
                <hr class="border-white border-t-2">
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
        </div>
    </div>
@endsection
