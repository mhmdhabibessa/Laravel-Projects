<div class="w-full mt-5">
    <form wire:submit.lazy.prevent="submit" class="flex flex-wrap">
        <div class="w-full p-4 md:w-1/2">
            <div class="w-full p-1">
                <label class="block">
                    <span class="font-bold text-primary">{{ __("City of Residence") }}</span>
                    <select wire:model="city" class="block w-full mt-1 form-select">
                        <option selected>{{ __("Select your City of Residence") }}</option>
                        @foreach($cities as $city)
                            <option value="{{ $city->id }}">{{ $city->name }}</option>
                        @endforeach
                    </select>
                    @error('city') <span class="text-red-400">{{ $message }}</span> @enderror
                </label>
            </div>
            <div class="w-full p-1">
                <label class="block">
                    <span class="font-bold text-primary">{{ __("Father Name") }}</span>
                    <input wire:model.lazy="father_name" class="block w-full mt-1 form-input" placeholder="{{ __("Ahmed Salem Jumaa") }}" required>
                    @error('first_name') <span class="text-red-400">{{ $message }}</span> @enderror
                </label>
            </div>
            <div class="w-full p-1">
                <label class="block">
                    <span class="font-bold text-primary">{{ __("Mother Name") }}</span>
                    <input wire:model.lazy="mother_name" class="block w-full mt-1 form-input" placeholder="{{ __("Reem Saeed Khalifa") }}" required>
                    @error('mother_name') <span class="text-red-400">{{ $message }}</span> @enderror
                </label>
            </div>
            <div class="w-full p-1">
                <label class="block">
                    <span class="font-bold text-primary">{{ __("Main Contact Mobile") }}</span>
                    <input wire:model.lazy="main_contact" class="block w-full mt-1 form-input" placeholder="{{ __("00971501234567") }}" required>
                    @error('main_contact') <span class="text-red-400">{{ $message }}</span> @enderror
                </label>
            </div>
            <div class="w-full p-1">
                <label class="block">
                    <span class="font-bold text-primary">{{ __("Emergency Contact Mobile") }}</span>
                    <input wire:model.lazy="emergency_contact" class="block w-full mt-1 form-input" placeholder="{{ __("00971501234567") }}" required>
                    @error('emergency_contact') <span class="text-red-400">{{ $message }}</span> @enderror
                </label>
            </div>
            <div class="w-full p-1">
                <label class="block">
                    <span class="font-bold text-primary">{{ __("Email") }}</span>
                    <input wire:model.lazy="email" class="block w-full mt-1 form-input" placeholder="{{ __("ahmad@email.com") }}" required>
                    @error('email') <span class="text-red-400">{{ $message }}</span> @enderror
                </label>
            </div>
        </div>
        <div class="w-full px-4 md:w-1/2">
            <div class="block">
                <span class="font-bold text-primary">{{ __("Receiving Books") }}</span>
                <div class="mt-2">
                    <div>
                        <label class="inline-flex items-center">
                            <input type="radio" class="form-radio" name="delivery" value="pickup" wire:model.lazy="delivery_method" checked>
                            <span class="mx-2">
                                {{ __("Pick Up") }}
                            </span>
                        </label>
                    </div>
                    <div>
                        <label class="inline-flex items-center">
                            <input type="radio" wire:model.lazy="delivery_method" class="form-radio" name="delivery" value="delivery">
                            <span class="mx-2">{{ __("Delivery") }}</span>
                        </label>
                    </div>
                </div>
            </div>
            @if($delivery_method === 'delivery')
                <label class="block">
                    <span class="font-bold text-primary">{{ __("Delivery Address") }}</span>
                    <input wire:model.lazy="delivery_address" class="block w-full mt-1 form-input" placeholder="{{ __("building, street, city") }}" required>
                    @error('delivery_address') <span class="text-red-400">{{ $message }}</span> @enderror
                </label>
            @endif

            @if($requireDiscount)
                <div class="block mb-4">
                    <span class="font-bold text-primary">{{ __("Upload Discount Card") }}</span>
                    <div class="mt-2">
                        <input type="file" wire:model="discount_card"
                               class="block w-full mt-1 form-input" required>
                    </div>
                </div>
            @endif

            <div class="block">
                <span class="font-bold text-primary">{{ __("Payment Method") }}</span>
                <div class="mt-2">
                    <div>
                        <label class="inline-flex items-center">
                            <input type="radio" class="form-radio" name="radio" value="online" wire:model.lazy="payment_method" checked>
                            <span class="mx-2">
                                {{ __("Online / Credit Card") }}
                            </span>
                        </label>
                    </div>
                    <div>
                        <label class="inline-flex items-center">
                            <input type="radio" wire:model.lazy="payment_method" class="form-radio" name="radio" value="transfer">
                            <span class="mx-2">{{ __("Bank Transfer") }}</span>
                        </label>
                    </div>
                </div>
            </div>
        </div>
        <div class="w-full p-4">
            <button type="submit" class="w-full btn btn-primary">
                {{ __("Register Now") }}
            </button>
        </div>
    </form>
</div>
