@extends('layouts.master')
@section('title', 'Invoice On Admin')
@section('body-id', 'order-today-page-admin')
@section('page-title')
  Today's Order
@endsection
@section('content')
  <main>
    <div class="container">
      <div class="row pt-4">
        <div class="col-12">
          <div class="accordion w-100" id="accordionExample">
            @foreach ($list_order as $order)
              @if ($order->type_cart === 'catalog')
                <div class="card">
                  <div class="card-header d-flex align-items-center" id="heading{{ $order->id }}">
                    <h2 class="mb-0">
                      <button class="btn bg--cream" type="button" data-toggle="collapse" data-target="#collapse{{ $order->id }}"
                      aria-expanded="true" aria-controls="collapse{{ $order->id }}">
                        {{ $order->getCustomer->name }}
                      </button>
                    </h2>
                    <var>3 pcs​</var>
                  </div>
                  <div id="collapse{{ $order->id }}" class="collapse show" aria-labelledby="heading{{ $order->id }}" data-parent="#accordionExample">
                    <div class="card-body">
                      <div class="mb-4">
                        <p class="mb-0">Formula Code: #02139</p>
                        <p class="mb-0">Acne​</p>
                      </div>
                      <ul>
                        <li>
                          <span>Super silk​</span>
                          <span>Coffee​</span>
                          <var>1 pcs</var>
                        </li>
                        <li>
                          <span>Super silk​</span>
                          <span>Coffee​</span>
                          <var>1 pcs</var>
                        </li>
                        <li>
                          <span>Super silk​</span>
                          <span>Coffee​</span>
                          <var>1 pcs</var>
                        </li>
                        <li><a href=""><i class='bx bxs-printer'></i> Print Recipe & Invoice​</a></li>
                        <li><a href=""><i class='bx bx-sync' ></i> Update status order​</a></li>
                        <li><a href=""><i class='bx bxs-truck' ></i> Input tracking number​</a></li>
                      </ul>
                    </div>
                  </div>
                </div>
              @endif
            @endforeach
            {{-- <div class="card">
              <div class="card-header d-flex align-items-center" id="headingTwo">
                <h2 class="mb-0">
                  <button class="btn bg--cream collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo"
                  aria-expanded="false" aria-controls="collapseTwo">
                    Reno​
                  </button>
                </h2>
                <var>3 pcs​</var>
              </div>
              <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                <div class="card-body">
                  <div>
                    <p>Formula Code: #02139</p>
                    <p>Acne​</p>
                  </div>
                  <ul>

                    <li>
                      <span>Super silk​</span>
                      <span>Coffee​</span>
                      <var>1 pcs</var>
                    </li>
                    <li>
                      <span>Super silk​</span>
                      <span>Coffee​</span>
                      <var>1 pcs</var>
                    </li>
                    <li>
                      <span>Super silk​</span>
                      <span>Coffee​</span>
                      <var>1 pcs</var>
                    </li>
                    <li><a href=""><i class='bx bxs-printer'></i> Print Recipe & Invoice​</a></li>
                    <li><a href=""><i class='bx bx-sync' ></i> Update status order​</a></li>
                    <li><a href=""><i class='bx bxs-truck' ></i> Input tracking number​</a></li>

                  </ul>
                </div>
              </div>
            </div> --}}
            {{-- <div class="card">
              <div class="card-header d-flex align-items-center" id="headingThree">
                <h2 class="mb-0">
                  <button class="btn bg--cream collapsed" type="button" data-toggle="collapse" data-target="#collapseThree"
                  aria-expanded="false" aria-controls="collapseThree">
                    Mulan​
                  </button>
                </h2>
                <var>3 pcs​</var>
              </div>
              <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                <div class="card-body">
                  <div>
                    <p>Formula Code: #02139</p>
                    <p>Acne​</p>
                  </div>
                  <ul>
                    <li>
                      <span>Super silk​</span>
                      <span>Coffee​</span>
                      <var>1 pcs</var>
                    </li>
                    <li>
                      <span>Super silk​</span>
                      <span>Coffee​</span>
                      <var>1 pcs</var>
                    </li>
                    <li>
                      <span>Super silk​</span>
                      <span>Coffee​</span>
                      <var>1 pcs</var>
                    </li>
                    <li><a href=""><i class='bx bxs-printer'></i> Print Recipe & Invoice​</a></li>
                    <li><a href=""><i class='bx bx-sync' ></i> Update status order​</a></li>
                    <li><a href=""><i class='bx bxs-truck' ></i> Input tracking number​</a></li>

                  </ul>
                </div>
              </div>
            </div>
            {{-- <div class="card">
              <div class="card-header d-flex align-items-center" id="headingFourth">
                <h2 class="mb-0">
                  <button class="btn bg--cream collapsed" type="button" data-toggle="collapse" data-target="#collapseFourth"
                  aria-expanded="false" aria-controls="collapseFourth">
                    Catchy Dharmawan
                  </button>
                </h2>
                <var>3 pcs​</var>
              </div>
              <div id="collapseFourth" class="collapse" aria-labelledby="headingFourth" data-parent="#accordionExample">
                <div class="card-body">
                  <div>
                    <p>Formula Code: #02139</p>
                    <p>Acne​</p>
                  </div>
                  <ul>
                    <li>
                      <span>Super silk​</span>
                      <span>Coffee​</span>
                      <var>1 pcs</var>
                    </li>
                    <li>
                      <span>Super silk​</span>
                      <span>Coffee​</span>
                      <var>1 pcs</var>
                    </li>
                    <li>
                      <span>Super silk​</span>
                      <span>Coffee​</span>
                      <var>1 pcs</var>
                    </li>
                    <li><a href=""><i class='bx bxs-printer'></i> Print Recipe & Invoice​</a></li>
                    <li><a href=""><i class='bx bx-sync' ></i> Update status order​</a></li>
                    <li><a href=""><i class='bx bxs-truck' ></i> Input tracking number​</a></li>
                  </ul>
                </div>
              </div>
            </div> --}}
          </div>
        </div>
      </div>
      <ul class="pagination">
        <li class="page-item disabled"><a class="page-link" href="#">Previous</a></li>
        <li class="page-item active"><a class="page-link" href="#">1</a></li>
        <li class="page-item"><a class="page-link" href="#">2</a></li>
        <li class="page-item"><a class="page-link" href="#">3</a></li>
        <li class="page-item"><a class="page-link" href="#">Next</a></li>
      </ul>
    </div>
  </main>
@endsection
