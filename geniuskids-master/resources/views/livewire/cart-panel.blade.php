@if($cartCount > 0)
<div
    class="bg-primary py-4 px-4 fixed bottom-0 right-0 w-full md:w-1/3 rounded-t shadow-2xl">
    <div class="flex justify-between">
        <div class="text-white">
            <i class="fal fa-shopping-cart mr-2"></i>
            <span>{{ __("You have") }} {{ $cartCount }} {{ __("students registered") }}</span>
        </div>
        <div>
            <a href="/{{ app()->getLocale() }}/cart" class="btn btn-secondary">
                <span class="text-xs tracking-wide text-white font-bold">{{ __("Checkout") }}</span>
            </a>
        </div>
    </div>
</div>
@endif
