@extends('layouts.master')
@section('title', 'Invoice On Admin')
@section('body-id', 'order-today-page-admin')
@section('page-title')
Today's Order
@endsection
@section('css')
<link rel="stylesheet" href="{{ asset('plugins/sweetalert2/sweetalert2.min.css') }}">
@endsection
@section('content')
<main>
  <div class="container">
    <div class="row pt-4">
      <div class="col-12">
        <div class="accordion w-100" id="accordionExample">
          @foreach ($list_order as $order)
          <div class="card">
            <div class="card-header d-flex align-items-center" id="heading{{ $order->id }}">
              <h2 class="mb-0">
                <button class="btn bg--cream" type="button" data-toggle="collapse" data-target="#collapse{{ $order->id }}"
                  aria-expanded="@if($order->id == 1) true @else false @endif" aria-controls="collapse{{ $order->id }}">
                  {{ $order->user_id->name }}
                </button>
              </h2>
              <var>{{ $order->total_qty . ' PCS' }}</var>
            </div>
            <div id="collapse{{ $order->id }}" class="collapse @if($order->id == 1) show @endif" aria-labelledby="heading{{ $order->id }}"
              data-parent="#accordionExample">
              <div class="card-body row mx-0">
                <div class="mb-4 col-12 px-0">
                  <p class="mb-0">Formula Code: {{ $order->formula_code }}</p>
                  <p class="mb-0">Acne​</p>
                </div>
                <ul class="col-12 px-0">
                  @if ($order->type_cart == 'custom')
                  @foreach ($order->item as $item)
                  <li>
                    @if ($item->sheet_name != null)
                    <span>Sheet Mask: {{ $item->sheet_name }}</span>
                    @elseif($item->fragrance_name != null)
                    <span>Serum: {{ $item->fragrance_name }}</span>
                    @endif
                    <var class="float-md-right">{{ $item->qty . ' PCS' }}</var>
                  </li>
                  @endforeach
                  @elseif ($order->type_cart == 'catalog')
                  @foreach ($order->item as $item)
                  <li>
                    <span>Product Name: {{ $item->product_name }}</span>
                    <span>Category: {{ $item->category }}</span>
                    <var class="float-md-right">{{ $item->qty . ' PCS' }}</var>
                  </li>
                  @endforeach
                  @endif
                </ul>
                <ul class="col-12 px-0 footer-action-order">
                  <li class="bg--cream">
                    <a href="{{ route('admin.order.print.invoice', $order->id) }}" class="text-dark">
                      <i class='bx bxs-printer'></i> 
                      Print Recipe & Invoice​
                    </a>
                  </li>
                  @if ($order->status == 'success')
                  <li style="border: 1px solid forestgreen">
                    <a href="javascript:void(0)" style="color: forestgreen;">
                      Status Payment: {{ $order->status }}
                    </a>
                  </li>
                  @elseif($order->status == 'pending')
                  <li style="border: 1px solid orange">
                    <a href="javascript:void(0)" style="color: orange;">
                      Status Payment: {{ $order->status }}
                    </a>
                  </li>
                  @elseif($order->status == 'failed' || $order->status == 'expired')
                  <li style="border: 1px solid red">
                    <a href="javascript:void(0)" style="color: red;">
                      Status Payment: {{ $order->status }}
                    </a>
                  </li>
                  @else
                  <li style="border: 1px solid #E2CCC1">
                    <a href="javascript:void(0)" class="text-light">
                      Status Payment: {{ $order->status }}
                    </a>
                  </li>
                  @endif
                  @if(empty($order->tracking_number))
                  <li class="bg--cream li-input-tracking-number"><a href="javascript:void(0)" data-id="{{$order->id}}" class="text-dark"><i class='bx bxs-truck' ></i> Input tracking number​</a></li>
                  @else
                  <li style="border: 1px solid #E2CCC1"><a href="javascript:void(0)" class="text-light">Tracking Number: {{$order->tracking_number}}</a></li>
                  @endif
                </ul>
              </div>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>
</main>
@endsection
@section('script')
<script src="{{ asset('plugins/sweetalert2/sweetalert2.min.js') }}"></script>
<script>
  $(document).on('click', '.li-input-tracking-number>a', async function() {
    var id = $(this).data('id');
    var parent = $(this).parents('ul.footer-action-order');
    Swal.fire({
      title: 'Enter your tracking number',
      input: 'text',
      inputPlaceholder: 'Enter your tracking number',
      inputAttributes: {
        autocapitalize: 'off'
      },
      inputValidator: (value) => {
        if (!value) {
          return 'You need to write tracking number!'
        }
      },
      showCancelButton: true,
      confirmButtonText: 'Submit',
      showLoaderOnConfirm: true,
      preConfirm: (trackingNumber) => {
        let formData = new FormData();
        formData.append('_token', "{{csrf_token()}}");
        formData.append('tracking_number', trackingNumber);
        return fetch(`{{route("admin.order.tracking.update")}}/${id}`, {
          method: "post",
          body: formData
        })
        .then(response => {
          if (!response.ok) {
            throw new Error(response.statusText)
          }
          return response.json()
        })
        .catch(error => {
          Swal.showValidationMessage(
          `Request failed: ${error}`
          )
        })
      },
      allowOutsideClick: () => !Swal.isLoading()
    }).then((result) => {
      if (result.value.status === 200) {
        Swal.fire(result.value.message);
        $(this).parents('li.li-input-tracking-number').remove();
        parent.append(`<li style="border: 1px solid #E2CCC1"><a href="javascript:void(0)" class="text-light">Tracking Number: ${result.value.tracking_number}</a></li>`);
      }
    })
  });
</script>
@endsection
