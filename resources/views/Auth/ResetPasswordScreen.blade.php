<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/ResetPassword.css">
</head>

<body>
    <div class="login-wrapper">

        <div class="errorContainer">
            @foreach ($errors->all() as $err)
                <p class="errors">{{ $err }}</p>
            @endforeach
        </div>

        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        <div id="forgot-pw">
            <form autocomplete="off" action="{{ route('password.update') }}" class="form" id="form-signup"
                method="POST">
                @csrf
                <h2>Reset Password</h2>
                <input type="hidden" name="token" value="{{ $token }}">
                <div class="input-group">
                    <input autocomplete="new-password" type="email" name="email" id="email">
                    <label for="email">Email</label>
                </div>
                <div class="input-group">
                    <input type="password" name="password" id="password" required>
                    <label for="password">New Password</label>
                </div>
                <div class="input-group">
                    <input type="password" name="password_confirmation" id="password_confirmation" required>
                    <label for="password_confirmation">Confirm Password</label>
                </div>
                <button type="submit" class="submit-btn">Reset Password</button>
            </form>
        </div>
    </div>
</body>

</html>
