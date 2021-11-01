@component('mail::message')
# {{ __("Hello") }}

{{ __("Thank you very much for making your order, please find below our bank details to make your deposit / transfer.") }}

{{ __("Once the deposit is made, it may take up to 48 hours for your order to be confirmed. You will receive an email once your order is confirmed.") }}

@component('mail::button', ['url' => config('app.url').'/'.$locale.'/order/'.$encryptedId])
{{ __("Click Here to View Your Order") }}
@endcomponent

{{ __("Thanks") }}<br>
{{ __("Genius Kids") }}
@endcomponent
