@component('mail::message')
{{-- # Payment receipt for customer with name <br> {{ $receipt->getCustomer->name }} --}}

What your customer buy
{{ $items }}
{{-- @foreach ($items as $item)
    - {{ $item }}
@endforeach --}}
{{-- - Sheet mask: Rp. 20,000
- Serum: Rp. 30,000
- Shipping cost: Rp. 9,000 --}}

{{-- Total price : {{ 'Rp. ' . number_format($receipt->total_price) }} --}}

** {{ config('app.name') }} **
@endcomponent
