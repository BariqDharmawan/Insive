@extends('layouts.master')
@section('title', 'Invoice On Admin')
@section('body-id', 'order-today-page-admin')
@section('page-title')
All Order
@endsection
@section('css')
<link rel="stylesheet" href="{{ asset('plugins/sweetalert2/sweetalert2.min.css') }}">
@endsection
@section('content')
<main>
  @php
      $colorText = "";
  @endphp
  <div class="container">
    <div class="row pt-4">
      <div class="col-12">
        <div class="accordion w-100" id="accordionExample">
          @foreach ($list_order as $order)
          <div class="card mb-4">
            <div class="card-header d-flex flex-column align-items-center flex-lg-row" 
            id="heading{{ $order->id }}">
              <h2 class="mb-0">
                <button class="btn bg--cream" type="button" data-toggle="collapse" 
                data-target="#collapse{{ $order->id }}" aria-controls="collapse{{ $order->id }}"
                aria-expanded="{{ $order->id == 1 ? 'true' : 'false' }}">
                  {{ $order->user_id->name }}
                </button>
              </h2>
              <div class="ml-lg-auto mt-3 mt-lg-0">
                <time class="mr-3">{{ $order->updated_at->format('d M Y H:i') }}</time>
                <var>{{ $order->total_qty . ' PCS' }}</var>
              </div>
            </div>
            <div id="collapse{{ $order->id }}" class="collapse {{ $order->id == 1 ? 'show' : '' }}"
            aria-labelledby="heading{{ $order->id }}" data-parent="#accordionExample">
              <div class="card-body row mx-0">
                <div class="mb-4 col-12 px-0">
                  <p class="mb-0">
                    Formula Code: {{ $order->formula_code }}
                  </p>
                  <p class="mb-0">Acne​</p>
                </div>
                <ul class="col-12 px-0">
                  @if ($order->type_cart == 'custom')
                  @forelse ($order->item as $item)
                  tests
                  <li>
                    <span>Product Name: {{ $item->name }}</span>
                    @if ($item->sheet_name != null)
                    <span>Sheet Mask: {{ $item->sheet_name }}</span>
                    @elseif ($item->fragrance_name != null)
                    <span>Serum: {{ $item->fragrance_name }}</span>
                    @endif
                    <var class="float-md-right">{{ $item->qty . ' PCS' }}</var>
                  </li>
                  @empty
                  <li>lah kosong</li>
                  @endforelse
                  @elseif ($order->type_cart == 'catalog')
                  @foreach ($order->item as $item)
                  <li>
                    <span>Product Name: {{ $item->product_name }}</span>
                    <span>Category: {{ $item->category }}</span>
                    <var class="float-lg-right">{{ $item->qty . ' PCS' }}</var>
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
                  
                  <li style="border: 1px solid #E2CCC1" class="status-order">
                    @switch($order->status)
                        @case('success')
                            @php $colorText = 'forestgreen' @endphp
                            @break
                        @case('pending')
                            @php $colorText = 'orange' @endphp
                            @break
                        @case('failed')
                            @php $colorText = 'red' @endphp
                          @break
                        @case('expired')
                            @php $colorText = 'red' @endphp
                          @break
                        @default
                    @endswitch
                    <a href="javascript:void(0)" class="font-weight-bold" style="color: {{ $colorText }}">
                      Status Payment: {{ $order->status }}
                    </a>
                  </li>
                  @isset($order->tracking_number)
                    <li class="status-terkirim">
                      Status terkirim: Sudah terkirim
                    </li>
                  @else
                    <li class="status-terkirim">
                      Status terkirim: Belum terkirim
                    </li>
                  @endisset
                  @if(empty($order->tracking_number))
                  <li class="bg--cream li-input-tracking-number">
                    <a href="javascript:void(0)" data-id="{{ $order->id }}" class="text-dark">
                      <i class='bx bxs-truck' ></i> 
                      Input tracking number​
                    </a>
                  </li>
                  @else
                  <li style="border: 1px solid #E2CCC1">
                    <a href="javascript:void(0)" class="text-light">
                      Tracking Number: {{ $order->tracking_number }}
                    </a>
                  </li>
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
        location.reload();
      }
    })
  });
</script>
@endsection
