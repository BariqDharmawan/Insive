@extends('layouts.master')
@section('title', 'Your Profile')
@section('page-title', 'My Profile')
@section('body-id', 'profile-page')
@section('css')
  <style media="screen">
    main {
      display: flex;
      align-items: center;
      height: calc(100vh - 80px - 65px - 60px);
    }
    .form-group {
      margin-bottom: 1.5rem;
    }
    @media screen and (min-width: 768px) {
      main {
        height: calc(100vh - 110px);
      }
    }
  </style>
@endsection
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
          @if (Auth::user()->email <> 'admin@insive.com')
          <small class="d-block mb-2">{{ Auth::user()->phone }}</small>
          @if (Auth::user()->role <> 'admin')
            <address>{{ Auth::user()->address }}</address>
          @endif
            <button type="button" class="btn btn-link text-info" data-toggle="modal" data-target="#fillProfile">
              @if (Auth::user()->phone == '' OR Auth::user()->address == '')
                Please Complete Your Profile
              @else
                Update Your Profile
              @endif
            </button>
          @endif
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
                <div class="modal-body py-4">
                  <form action="{{ route('profile.update', Auth::user()->id) }}" id="completeProfile"
                  enctype="multipart/form-data" method="post">
                    @csrf @method('PUT')
                    <div class="form-group">
                      <label for="name_customer">Your Fullname</label>
                      <input type="text" name="name_customer" id="name_customer" class="form-control"
                      value="{{ Auth::user()->name }}" required>
                    </div>
                    <div class="form-group">
                      <label for="name_customer">Your Fullname</label>
                      <input type="email" name="email_customer" class="form-control"
                      value="{{ Auth::user()->email }}" required>
                    </div>
                    <div class="form-group">
                      <label for="name_customer">Your Phone Number</label>
                      <input type="number" name="phone_customer" class="form-control" placeholder="Fill Your Phone Number"
                      @if (Auth::user()->phone <> '') value="{{ Auth::user()->phone }}" @endif required>
                    </div>
                    <div class="form-group">
                      <label for="name_customer">Your Address</label>
                      <textarea name="address_customer" rows="8" class="form-control"
                      placeholder="Fill Your Address">{{ Auth::user()->address }}</textarea>
                      @if (Auth::user()->role == 'admin')
                      <small class="form-text text-secondary">
                        To change your address, please follow this :
                        (1) go to Google Maps
                        (2) find a place
                        (3) click share button on the left side (modal will appear)
                        (4) click embed map
                        (5) click copy html
                      </small>
                      @endif
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
    });
  </script>
@endsection
