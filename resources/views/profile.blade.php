@extends('layouts.master')
@section('title', 'Your Profile')
@section('page-title', 'My Profile')
@section('body-id', 'profile-page')
@section('content')
  <main>
    <div class="container">
      @if (Session::has('success_message') || Session::has('failed_message'))
      <div class="col-12 message-session">
          <div class="alert alert-{{(Session::has('success_message'))? 'success' : 'danger'}} text-center">
              {{ (Session::has('success_message'))? Session::get('success_message') : Session::get('failed_message') }}
          </div>
      </div>
      @endif
      <figure class="profile">
        <img src="{{ Storage::url($myprofile->image) }}" height="150" alt="Profile Photo">
        <figcaption class="profile__details text--cream">
          <p>{{ Auth::user()->name }}</p>
          <small class="mb-2">{{ Auth::user()->email }}</small>
          <small class="d-block mb-2">{{ Auth::user()->phone }}</small>
          <address>{{ Auth::user()->address }}</address>
          <button type="button" class="btn btn-link text-info" data-toggle="modal" data-target="#fillProfile">
            @if (Auth::user()->phone == '' OR Auth::user()->address == '')
              Please Complete Your Profile
            @else
              Update Your Profile
            @endif
          </button>
          <div class="modal fade" id="fillProfile" tabindex="-1" role="dialog"
          aria-labelledby="fillProfileLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="fillProfileLabel">Complete Your Profile</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form action="{{ route('profile.update', Auth::user()->id) }}" id="completeProfile" enctype="multipart/form-data" method="post">
                    @csrf @method('PUT')
                    <div class="form-group">
                      <input type="text" name="name_customer" class="form-control"
                      value="{{ Auth::user()->name }}" required>
                    </div>
                    <div class="form-group">
                      <input type="email" name="email_customer" class="form-control"
                      value="{{ Auth::user()->email }}" required>
                    </div>
                    <div class="form-group">
                      <input type="number" name="phone_customer" class="form-control" placeholder="Fill Your Phone Number"
                      @if (Auth::user()->phone <> '') value="{{ Auth::user()->phone }}" @endif required>
                    </div>
                    <div class="form-group">
                      <textarea name="address_customer" rows="8" class="form-control"
                      placeholder="Your Address">@if (Auth::user()->address <> ''){{ Auth::user()->address }}@endif</textarea>
                    </div>
                    <div class="form-group text-left">
                      <label for="avatarCustomer" class="mb-2">Change Your Avatar</label>
                      <input type="file" class="form-control-file" id="avatarCustomer" name="avatarCustomer">
                    </div>
                  </form>
                </div>
                <div class="modal-footer">
                  <button type="submit" form="completeProfile" class="btn bg--cream">Update My Profile</button>
                </div>
              </div>
            </div>
          </div>
        </figcaption>
      </figure>
    </div>
  </main>
@endsection
@section('script')
  <script>
    $(document).ready(function() {
      $(".message-session").delay(400).fadeOut('slow');
      bsCustomFileInput.init();
    });
  </script>
@endsection
