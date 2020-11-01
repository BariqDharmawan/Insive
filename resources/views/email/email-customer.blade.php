<h1>Order status</h1>
<br>
<p>Your order is {{ $status }}.</p>
<p>Order date: {{ now()->format('Y-m-d h:i') }}</p>
@if ($status == 'process')
    <p>We'll send another email if your order already sent to you</p>
@endif

{{-- @component('mail::button', ['url' => ''])
Click to see your order
@endcomponent --}}

<p style="font-weight: bold">Thanks, {{ config('app.name') }}</p>

<p style="font-size: 0.8rem">Please don't reply this email, because it's automatically generated from our system</p>