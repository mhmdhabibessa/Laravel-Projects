@component('mail::message')
# {{ __("Your Order is Confirmed") }}
{{ __("Thank you for being part of Genius Kids family") }}
{{ __("This is a confirmation of your order for the following") }}:
@component('mail::panel')
# {{ __("Parents Information") }}
@component('mail::table')
| | |
|:-:|:-:|
| {{ __("Father Name") }} | {{ $fatherName }} |
| {{ __("Mother Name") }} | {{ $motherName }} |
| {{ __("Main Contact Mobile") }} | {{ $mainContact }}|
| {{ __("Emergency Contact Mobile") }} | {{ $emergencyContact }}|
| {{ __("Email") }} | {{ $guardianEmail }}|
@endcomponent
@endcomponent
# {{ __("Student(s) Information") }}
@foreach($students as $student)

@component('mail::panel')
@component('mail::table')
| | |
|:-:|:-:|
| {{ $student->name }} | {{ $student->schedule->name }} |
| {{ $student->schedule->starts_on->format('d-m-Y') }} <br> {{ __("to") }} <br> {{ $student->schedule->ends_on->format('d-m-Y') }} | @foreach($student->schedule->days_of_week as $slot) {{ __($slot['attributes']['day']) }} - {{ Str::replaceLast(':00', '', $slot['attributes']['starting_time']) }} {{ __("to") }} {{ Str::replaceLast(':00', '', $slot['attributes']['ending_time']) }} <br> @endforeach |
@endcomponent
@endcomponent
@endforeach
# {{ __("Proforma Invoice") }}
@component('mail::panel')
@component('mail::table')
| | |
|:-:|:-:|
| {{ __("Total") }} | {{ $total }} |
| {{ __("Discount") }} | {{ $discount }} |
| {{ __("Grand Total") }} | {{ $grandTotal }} |
| {{ __("VAT") }} (5%) | {{ $vat }} |
| {{ __("Payment Method") }} | {{ $paymentMethod }} |
@endcomponent
@endcomponent

{{ __("Thanks") }}<br>
{{ __("Genius Kids") }}
@endcomponent
