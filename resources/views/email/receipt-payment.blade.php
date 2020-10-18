@component('mail::message')
# Payment receipt for customer with name {{ $receipt->getCustomer->name }}

The body of your message.

{{-- @component('mail::button', ['url' => ''])
Button Text
@endcomponent --}}

{{ config('app.name') }}
@endcomponent
