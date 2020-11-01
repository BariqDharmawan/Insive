<style>
    tbody tbody tbody tbody td {
        text-align: center;
    }
    tbody tbody tbody tbody td:last-child {
        border-left: 1px solid #edeff2;
        padding: 10px 0 10px 15px !important;
    }
</style>

@component('mail::message')
# Here's the detail of your customer purchase details

<p>Customer name : <b>{{ '$order->user_id->name' }}</b></p>
<p>Customer email : <b> {{ '$order->user_id->email' }}</b></p>

What your customer buy
@component('mail::table')
    | Product name | QTY |
    | ------------ |:--- |
    {{-- @foreach ($order->item as $item) --}}
    | {{ '$item->product_name' }} | {{ '$item->qty' . ' PCS' }}
    {{-- @endforeach --}}
@endcomponent
    

## Formula code : {{ '$order->formula_code' }}
## Total Price : {{ 'Rp. ' . 'number_format($order->total_price)' }}

@endcomponent
