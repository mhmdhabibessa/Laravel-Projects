@extends('app')
@section('content')
    <div class="container flex flex-wrap">
        <div class="w-full">
            <h1 class="text-3xl text-primary font-bold py-5">{{ __("Registration")  }}</h1>
        </div>
        <div class="w-full p-0 md:p-4">
            <livewire:cart-items />
        </div>
        @if(!$students->isEmpty())
            <livewire:checkout />
        @endif
    </div>
@endsection
