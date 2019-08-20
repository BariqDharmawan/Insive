@extends('layouts.master')
@section('title', 'Invoice On Admin')
@section('body-id', 'recipe-page-admin')
@section('page-title')
  Recipe Backend <br> Admin
@endsection
@section('content')
  <main>
    <div class="container">
      <div class="row mx-0 pt-5 justify-content-between">
        <div class="col-12 col-md-5">
          <div>
            <p>Customer Name: Cathy​</p>
            <p>Formula Code : #02139​</p>
            <p>Special ingredients: Salicylic acid & lemon stem extract​</p>
          </div>
          <div>
            <p>Sheet Type / Fragrance: <span>Super silk / Coffee</span></p>
          </div>
        </div>
        <div class="col-12 col-md-5">
          <div>
            <p>Customer Name: Cathy​</p>
            <p>Formula Code : #02139​</p>
            <p>Special ingredients: Salicylic acid & lemon stem extract​</p>
          </div>
          <div>
            <p>Sheet Type / Fragrance: <span>Biocellulose / Strawberry​</span></p>
          </div>
        </div>
        <div class="col-12 col-md-5">
          <div>
            <p>Customer Name: Cathy​</p>
            <p>Formula Code : #02139​</p>
            <p>Special ingredients: Salicylic acid & lemon stem extract​</p>
          </div>
          <div>
            <p>Sheet Type / Fragrance: <span>Biocellulose / Unscented​</span></p>
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
