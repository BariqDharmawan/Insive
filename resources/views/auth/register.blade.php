<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Page</title>
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
    <link href='https://unpkg.com/boxicons@2.0.2/css/boxicons.min.css' rel='stylesheet'>
</head>

<body id="registerPage">
    <main>
        <div class="label-box">
            <label for="signIn" class="label-box__name">
                <a href="{{ route('login') }}">Sign In</a>
            </label>
            <label for="signUp" class="label-box__name">
                <a href="{{ route('register') }}">Sign Up</a>
            </label>
        </div>
        <section class="register">
            <h1>Create your account</h1>
            <p>
                For get our bennefit. If you does have an account,
                <span>
                    <a href="{{ route('login') }}">Sign in with my account!</a>
                </span>
            </p>
            <form action="{{ route('register') }}" method="post" class="fg-1">
                @csrf
                <input type="text" name="name" placeholder="What's You Full Name" autocomplete="name"
                    value="{{ old('name') }}">
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <input type="email" name="email" placeholder="What's your email" pattern=".{8,}" minlength="8"
                    title="minimal characters 8" required autofocus>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <input type="password" name="password" placeholder="Create your password" pattern=".{8,}" minlength="8"
                    title="minimal characters 8" autocomplete="new-password" required>
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <input type="password" name="password_confirmation" placeholder="Confirm Password" required
                    autocomplete="new-password" required>
                <textarea name="address" class="form-control" rows="8"
                    placeholder="Where Do You Life?" required>{{ old('address') }}</textarea>
                @error('address')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <button type="submit">Sign Up</button>
                <a href="{{ url('/') }}" class="backto-homepage">
                    <i class='bx bx-arrow-back' style="margin-right: 10px"></i>
                    Back To Homepage
                </a>
            </form>
        </section>
    </main>
    <script src="{{ asset('js/jquery.js') }}" charset="utf-8"></script>
</body>

</html>
