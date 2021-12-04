<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/LoginCss.css">
    <title></title>
</head>

<body>
    <div class="flash-message">
        @foreach (['danger', 'warning', 'success', 'info'] as $msg)
            @if (Session::has('alert-' . $msg))
                <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }}
                </p>
            @endif
        @endforeach
    </div>
    <div class="login-wrapper">
        <form action="{{ route('LoginPage') }}" id="form-login" autocomplete="false" class="form" method="POST">
            @csrf
            <img src="/img/avatar.jpg" alt="">
            <h2>Login</h2>

            @error('email')
            <div class="errorContainer">
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            </div>
            @enderror

            <div class="input-group">
                <input autocomplete="new-password" type="text" name="email" id="loginUser" value="{{ old('loginUser') }}">
                <label for="loginUser">Email</label>
            </div>

            @error('password')
            <div class="errorContainer">
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            </div>
                @enderror

            <div class="input-group">
                <input autocomplete="new-password" type="password" name="password" id="passwordUser" value="{{ old('passwordUser') }}">
                <label for="passwordUser">Password</label>
            </div>
            <div class="input-a-wrapper">
                <button type="submit" form="form-login" class="submit-btn">LOGIN</button>
                <a href="#sign-up" class="sign-up-btn">Create Account</a>
            </div>
            <a href="#forgot-pw" class="forgot-pw">Forgot Password?</a>
        </form>
        <div id="forgot-pw">
            <form autocomplete="off" action="" class="form" id="form-signup" method="POST">
                @csrf
                <a href="#" class="close">&times;</a>
                <h2>Reset Password</h2>
                <div class="input-group">
                    <input autocomplete="new-password" type="email" name="email" id="email">
                    <label for="email">Email</label>
                </div>
                <input type="button" value="Reset" class="submit-btn">
            </form>
        </div>
        <div id="sign-up">

            <form action="{{ route('register') }}" class="form" autocomplete="off" method="POST">
                @csrf
                <a href="#" class="close">&times;</a>
                <h2>SignUp</h2>

                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                <div class="input-group">
                    <input autocomplete="new-password" type="text" name="name" id="Name" value="{{ old('name') }}" }}
                        required>
                    <label for="loginUser">Name*</label>
                </div>

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                <div class="input-group">
                    <input autocomplete="new-password" type="email" name="email" id="Email" value="{{ old('email') }}"
                        required>
                    <label for="Email">Email*</label>
                </div>

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                <div class="input-group">
                    <input autocomplete="new-password" type="password" name="passwordUser" id="passwordUser" required>
                    <label for="passwordUser">Password*</label>
                </div>
                <div class="input-group">
                    <input autocomplete="new-password" type="password" name="confirm-password" id="confirm-password"
                        required>
                    <label for="confirm-password">Confirm Password*</label>
                </div>

                @error('countrySelected')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                @error('city')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                <div class="country-city-wrapper">
                    <div class="input-group">
                        <select onselect="update()" name="countrySelected" id="countrySelected">
                            @foreach ($countries as $cou)
                                @if (old('countrySelected') == $cou->nicename)
                                    <option value="{{ $cou->nicename }}" selected>{{ $cou->nicename }}</option>
                                @else
                                    <option value="{{ $cou->nicename }}">{{ $cou->nicename }}</option>
                                @endif
                            @endforeach
                        </select>
                        <label for="countrySelected">Country*</label>
                    </div>
                    <div class="input-group">
                        <input autocomplete="new-password" type="text" name="city" id="city" required
                            value="{{ old('city') }}">
                        <label for="city">City*</label>
                    </div>
                </div>

                @error('phoneNumber')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                <div class="input-group">
                    <input autocomplete="new-password" type="text" name="phoneNumber" id="phoneNumber" required
                        value="{{ old('phoneNumber') }}">
                    <label for="phoneNumber">Phone Number*</label>
                </div>


                @error('zipcode')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                @error('address')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                <div class="country-city-wrapper">
                    <div class="input-group">
                        <input autocomplete="new-password" type="text" name="zipcode" id="zipcode" maxlength="5"
                            value="{{ old('zipcode') }}">
                        <label for="zipcode">ZipCode</label>
                    </div>
                    <div class="input-group">
                        <input autocomplete="new-password" type="text" name="address" id="address"
                            value="{{ old('address') }}">
                        <label for="address">Address</label>
                    </div>
                </div>
                <button type="submit" class="submit-btn">Create</button>
            </form>
        </div>
    </div>
    <script type="text/javascript">
        // function update() {
        //     var select = document.getElementById('countrySelected');
        //     var option = select.options[select.value];
        //     $countries.forEach(element => {
        //         if (element - > nicename == option) {
        //             var option2 = document.getElementById('phoneNumber').value;
        //             document.getElementById('phoneNumber').value = element - > phoneCode + option2;
        //         }
        //     });
        // }
        // document.getElementById('phoneNumber').addEventListener("input", update);
    </script>
</body>

</html>
