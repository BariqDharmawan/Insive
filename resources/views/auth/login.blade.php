<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Auth</title>
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
    <link href='https://unpkg.com/boxicons@2.0.2/css/boxicons.min.css' rel='stylesheet'>
  </head>
  <body>
    <main>
      <input type="radio" id="signIn" name="same" checked>
      <label for="signIn"><a href="{{ route('login') }}">Sign In</a></label>
      <input type="radio" name="same" id="signUp">
      <label for="signUp"><a href="{{ route('register') }}">Sign Up</a></label>
      <section class="login">
        <h1>Sign In with your account</h1>
        <p>To interact with our shop. If you don't have an account, <span>Make your account!</span></p>
        <form action="{{ url('login') }}" method="post">
          @csrf
          <input type="email" placeholder="Input your email" name="email" autocomplete="email" pattern=".{8,}" minlength="8" title="minimal characters 8" autofocus required>
          <input type="password" placeholder="Input your password" name="password" pattern=".{8,}" minlength="8" title="minimal characters 8" required>
          @if (Route::has('password.request'))
          <a href="{{ route('password.request') }}" id="forgot-password">I'm forgot my password!</a>
          @endif
          <button type="submit">Sign In</button>
        </form>
        <div class="sosmed-login">
          <p id="sosmed-label">or maybe you prefer using your social media</p>
          <a href="{{ url('login/google') }}" class="sosmed-login__google"><img src="{{ asset('img/logo/glogo.svg') }}" height="40"> Sign In With Google</a>
          <a href="{{ url()->previous() }}" class="backto-homepage"><i class='bx bx-arrow-back' style="margin-right: 10px"></i> Back To Homepage</a>
        </div>
      </section>
    </main>
    <script src="{{ asset('js/jquery.js') }}" charset="utf-8"></script>
    <script>
      $(document).ready(function(){
        // optional, only for blue link
        $("main .login p span").click(function(){
          $("input#signUp").prop("checked", true);
        });
        $("main .register p span").click(function(){
          $("input#signIn").prop("checked", true);
        });
      });
    </script>
  </body>
</html>
