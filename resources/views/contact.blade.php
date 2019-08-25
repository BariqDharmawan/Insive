@extends('layouts.master')
@section('title', 'Contact Us')
@section('page-title', 'Contact Us')
@section('body-id', 'contact-us-page')
@section('content')
  <main>
    <div class="container py-5">
      <div class="row">
        <div class="col-12 col-lg-6 pr-lg-5">
          <form class="d-block mb-3 mb-lg-0" action="" method="post">
            @csrf
            <div class="form-group">
              <input type="text" class="form-control" id="peopleName" placeholder=" &nbsp; ">
              <label for="peopleName">What is your name</label>
            </div>
            <div class="form-group">
              <input type="email" class="form-control" id="peopleEmail" placeholder=" &nbsp; ">
              <label for="peopleEmail">What is your email</label>
            </div>
            <div class="form-group">
              <textarea name="message" id="peopleMessage" rows="7" placeholder=" &nbsp; " class="form-control"></textarea>
              <label for="peopleMessage">Let drop your message</label>
            </div>
            <button type="submit" class="btn bg--cream">Send <i class='bx bx-send ml-3'></i></button>
          </form>
        </div>
        <div class="col-12 col-lg-6 pl-lg-5">
          <ul class="list-contact">
            <li>
              <i class='bx bx-mail-send'></i>
              <a href="mailto:yollamiranda@gmail.com?subject=contact+us">yollamiranda@gmail.com</a>
            </li>
            <li>
              <i class='bx bxs-phone' ></i>
              <a href="tel:+62811-1257-596">0811-1257-596</a>
            </li>
            <li>
              <i class='bx bxl-instagram-alt'></i>
              <a href="https://www.instagram.com/bariq.dharmawan/">@insive.id</a>
            </li>
          </ul>
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31722.66662382847!2d106.80605039999996!3d-6.350872700000011!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69ee81751243dd%3A0x34aadb73e9f86bf2!2sJl.+Swadaya+Gudang+Baru+No.15+A%2C+RT.5%2FRW.4%2C+Ciganjur%2C+Kec.+Jagakarsa%2C+Kota+Jakarta+Selatan%2C+Daerah+Khusus+Ibukota+Jakarta+12630!5e0!3m2!1sen!2sid!4v1564569578385!5m2!1sen!2sid" width="600" height="270" frameborder="0" style="border:0" allowfullscreen></iframe>
        </div>
      </div>
    </div>
  </main>
@endsection
