@if(isset($specificDates))
    <div>
        <input
            class="form-input w-full mt-1"
            placehold="YYYY-MM-DD"
            x-data
            x-ref="input"
            x-init="flatpickr($refs.input, {
        dateFormat: 'd-m-Y',
                enable: {{ $specificDates }},
        locale: '{{ app()->getLocale() }}',
        })"
            type="text"
            placeholder="{{ __("Select Date") }}"
            {{ $attributes }}
        >
    </div>
@else
    <div>
        <input
            class="form-input w-full mt-1"
            placehold="YYYY-MM-DD"
            x-data
            x-ref="input"
            x-init="flatpickr($refs.input, {
        dateFormat: 'd-m-Y',
        minDate: '{{ $minDate }}',
        maxDate: '{{ $maxDate }}',
        locale: '{{ app()->getLocale() }}',
        })"
            type="text"
            placeholder="{{ __("Select Date") }}"
            {{ $attributes }}
        >
    </div>
@endif
