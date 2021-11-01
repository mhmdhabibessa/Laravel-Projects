@extends('app')

@section('content')
    <div class="container flex flex-wrap">
        <div class="w-full">
            <h1 class="py-5 text-3xl font-bold text-primary">{{ __("Purchase Order Pending Payment")  }}</h1>
        </div>
        <div class="flex flex-wrap w-full mb-4">
            <div class="w-full md:w-1/2 p-4">
                <p class="mb-2">
                    {{ __("Thank you very much for making your order, please find below our bank details to make your deposit / transfer.") }}
                    <br>
                    {{ __("Once the deposit is made, it may take up to 48 hours for your order to be confirmed. You will receive an email once your order is confirmed.") }}
                </p>
                <ul class="list-none">
                    <li class="border-b border-gray-200 py-2">
                        {{ __("Beneficiary Name") }}: <strong>{{ settings('beneficiary_name') }}</strong>
                    </li>
                    <li class="border-b border-gray-200 py-2">
                        {{ __("Bank Name") }}: <strong>{{ settings('bank_name') }}</strong>
                    </li>
                    <li class="border-b border-gray-200 py-2">
                        {{ __("Account Number") }}: <strong>{{ settings('account_number') }}</strong>
                    </li>
                    <li class="border-b border-gray-200 py-2">
                        {{ __("IBAN Number") }}: <strong>{{ settings('iban_number') }}</strong>
                    </li>
                    <li class="border-b border-gray-200 py-2">
                        {{ __("Swift Code") }}: <strong>{{ settings('swift_code') }}</strong>
                    </li>
                </ul>
            </div>
            <div class="w-full md:w-1/2 p-4 bg-gray-200">
                <ul class="list-none">
                    <li class="py-2">
                        {{ __("Father Name") }}: <strong>{{ $order->father_name }}</strong>
                    </li>
                    <li class="py-2">
                        {{ __("Mother Name") }}: <strong>{{ $order->mother_name }}</strong>
                    </li>
                    <li class="py-2">
                        {{ __("Main Contact Mobile") }}: <strong>{{ $order->main_contact }}</strong>
                    </li>
                    <li class="py-2">
                        {{ __("Emergency Contact Mobile") }}: <strong>{{ $order->emergency_contact }}</strong>
                    </li>
                    <li class="py-2">
                        {{ __("Email") }}: <strong>{{ $order->email }}</strong>
                    </li>
                    <li class="py-2">
                        {{ __("Order Details") }}
                    </li>
                </ul>
                <hr class="border-white border-t-2">
                @foreach($order->order_details as $student)
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
                        <span class="w-full">{{ __("AED") }} {{ $order->total }}</span>
                    </div>
                </div>
                @if($order->discount > 0)
                    <div class="flex flex-wrap w-full">
                        <div class="hidden w-2/5 p-2 font-bold text-center md:flex">
                        </div>
                        <div class="w-1/2 p-2 font-bold text-center bg-gray-200 md:w-2/5 text-primary">
                            <span class="w-full">{{ __("Discount") }}</span>
                        </div>
                        <div class="w-1/2 p-2 font-bold text-center bg-gray-200 md:w-1/5 text-primary">
                            <span class="w-full">{{ __("AED") }}  {{ $order->discount }}</span>
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
                        <span class="w-full">{{ __("AED") }} {{ $order->vat }}</span>
                    </div>
                </div>
                <div class="flex flex-wrap w-full">
                    <div class="hidden w-2/5 p-2 font-bold text-center md:flex">
                    </div>
                    <div class="w-1/2 p-2 font-bold text-center bg-gray-200 md:w-2/5 text-primary">
                        <span class="w-full">{{ __("Grand Total") }}</span>
                    </div>
                    <div class="w-1/2 p-2 font-bold text-center bg-gray-200 md:w-1/5 text-primary">
                        <span class="w-full">{{ __("AED") }} {{ $order->grand_total }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
