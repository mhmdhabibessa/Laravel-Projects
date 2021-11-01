<div x-data="{ isOpen : false }" x-on:close-modal.window="isOpen = false">
    <button class="w-full mt-2 btn btn-primary" @click="isOpen = true">
        {{ __("Register Now") }}
    </button>
    <div
        x-show="isOpen"
        x-transition:enter="transition transform ease-out duration-100"
        x-transition:enter-start="opacity-0 scale-75"
        x-transition:enter-end="opacity-100 scale-100"
        x-transition:leave="transition transform ease-out duration-100"
        x-transition:leave-start="opacity-100 scale-100"
        x-transition:leave-end="opacity-0 scale-75"
        class="fixed inset-0 z-10 overflow-y-auto" x-cloak>
        <div class="flex items-end justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
            <div class="fixed inset-0 transition-opacity">
                <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
            </div>
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>&#8203;
            <div class="inline-block overflow-hidden text-left align-bottom transition-all transform bg-white rounded-lg shadow-xl sm:my-8 sm:align-middle sm:max-w-4xl sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
                <form wire:submit.prevent="submit">
                    <div class="px-4 pt-5 pb-4 bg-white sm:p-6 sm:pb-4">
                        <div class="flex-wrap sm:flex sm:items-start">
                            <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                                <h3 class="text-lg font-bold leading-6 text-primary" id="modal-headline">
                                    {{ __("Register a Student") }}
                                </h3>
                            </div>
                            <div class="flex flex-wrap w-full py-4">
                                <div class="w-full p-1 md:w-1/3">
                                    <label class="block text-center">
                                        <span class="text-gray-700">{{ __("Student First Name") }}</span>
                                        <input wire:model.lazy="first_name" class="block w-full mt-1 form-input" placeholder="{{ __("Ahmed") }}" required>
                                        @error('first_name') <span class="text-red-400">{{ $message }}</span> @enderror
                                    </label>
                                </div>
                                <div class="w-full p-1 md:w-1/3">
                                    <label class="block text-center">
                                        <span class="text-gray-700">{{ __("Student Middle Name") }}</span>
                                        <input wire:model.lazy="middle_name" class="block w-full mt-1 form-input" placeholder="{{ __("Salem") }}" required>
                                        @error('middle_name') <span class="text-red-400">{{ $message }}</span> @enderror
                                    </label>
                                </div>
                                <div class="w-full p-1 md:w-1/3">
                                    <label class="block text-center">
                                        <span class="text-gray-700">{{ __("Student Last Name") }}</span>
                                        <input wire:model.lazy="last_name" class="block w-full mt-1 form-input" placeholder="{{ __("Jumaa") }}" required>
                                        @error('last_name') <span class="text-red-400">{{ $message }}</span> @enderror
                                    </label>
                                </div>
                                <div class="w-full p-1 md:w-1/3">
                                    <label class="block text-center">
                                        <span class="text-gray-700">{{ __("Gender") }}</span>
                                        <select wire:model="gender" class="form-select mt-1 block w-full">
                                            <option selected>{{ __("Select Option") }}</option>
                                            <option value="Male">{{ __("Male") }}</option>
                                            <option value="Female">{{ __("Female") }}</option>
                                        </select>
                                        @error('gender') <span class="text-red-400">{{ $message }}</span> @enderror
                                    </label>
                                </div>
                                <div class="w-full p-1 md:w-1/3">
                                    <label class="block text-center">
                                        <span class="text-gray-700">{{ __("Email") }}</span>
                                        <input wire:model.lazy="email" type="email" class="block w-full mt-1 form-input" placeholder="{{ __("ahmed@email.com") }}" required>
                                        @error('email') <span class="text-red-400">{{ $message }}</span> @enderror
                                    </label>
                                </div>
                                <div class="w-full p-1 md:w-1/3">
                                    <label class="block text-center">
                                        <span class="text-gray-700">{{ __("Date of Birth") }}</span>
                                        <x-date-picker wire:model.ignore="dob" :minDate="$schedule->min_dob->format('d-m-Y')" :maxDate="$schedule->max_dob->format('d-m-Y')"/>
                                        @error('dob') <span class="text-red-400">{{ $message }}</span> @enderror
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="px-4 py-3 bg-gray-50 sm:px-6 sm:flex sm:flex-row-reverse">
                        <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                          <button type="submit" class="w-full mx-2 font-bold btn btn-primary">
                            {{ __("Confirm") }}
                          </button>
                        </span>
                        <span class="flex w-full mt-3 rounded-md shadow-sm sm:mt-0 sm:w-auto">
                          <button type="button"
                                  @click="isOpen = false"
                                  class="w-full mx-2 font-bold text-white bg-red-500 btn">
                                    {{ __("Cancel") }}
                          </button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
