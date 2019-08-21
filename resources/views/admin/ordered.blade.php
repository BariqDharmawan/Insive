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
        <div class="accordion" id="accordionExample">
          <div class="card">
            <div class="card-header d-flex align-items-center" id="headingOne">
              <h2 class="mb-0">
                <button class="btn bg--cream" type="button" data-toggle="collapse" data-target="#collapseOne"
                aria-expanded="true" aria-controls="collapseOne">
                  Cathy
                </button>
              </h2>
              <var class="ml-3">3 pcs​</var>
            </div>

            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
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
                    <a href="#">Print Recipe & Invoice​</a>
                    <a href="">Update status order​</a>
                    <a href="">Input tracking number​</a>
                  </li>
                  <li></li>
                  <li></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="card">
            <div class="card-header d-flex align-items-center" id="headingTwo">
              <h2 class="mb-0">
                <button class="btn bg--cream collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo"
                aria-expanded="false" aria-controls="collapseTwo">
                  Reno​
                </button>
              </h2>
              <var class="ml-3">3 pcs​</var>
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
                    <a href="#"></a>
                    <a href="#"></a>
                  </li>
                  <li></li>
                  <li></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="card">
            <div class="card-header d-flex align-items-center" id="headingThree">
              <h2 class="mb-0">
                <button class="btn bg--cream collapsed" type="button" data-toggle="collapse" data-target="#collapseThree"
                aria-expanded="false" aria-controls="collapseThree">
                  Mulan​
                </button>
              </h2>
              <var class="ml-3">3 pcs​</var>
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
                    <a href="#"></a>
                    <a href=""></a>
                    <a href="#"></a>
                  </li>
                  <li></li>
                  <li></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <div class="col-12">
          <span>Cathy​ Dharmawan</span>
          <var class="ml-3">3 pcs​</var>
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
