<!DOCTYPE html>
<html lang="{{ $app->getLocale() }}" >
<head>
@include('partials.head')
@livewireStyles
</head>
<body class="{{ app()->getLocale() }}">
@include('partials.navbar')
@yield('content')
@unless(Route::is('cart') || Route::is('payment.create'))
<livewire:cart-panel />
@endunless
@livewireScripts
@include('partials.footer')
@yield('scripts')
</body>
</html>
