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
    <div class="login-wrapper">
        <form action="" autocomplete="false" class="form">
            <img src="/img/avatar.jpg" alt="">
            <h2>Login</h2>
            <div class="input-group">
                <input autocomplete="new-password" type="text" name="loginUser" id="loginUser" required>
                <label for="loginUser">Email</label>
            </div>
            <div class="input-group">
                <input autocomplete="new-password" type="password" name="passwordUser" id="passwordUser" required>
                <label for="passwordUser">Password</label>
            </div>
            <div class="input-a-wrapper">
                <input type="button" value="Login" class="submit-btn">
                <a href="#sign-up" class="sign-up-btn">Create Account</a>
            </div>
            <a href="#forgot-pw" class="forgot-pw">Forgot Password?</a>
        </form>
        <div id="forgot-pw">
            <form autocomplete="off" action="" class="form">
                <a href="#" class="close">&times;</a>
                <h2>Reset Password</h2>
                <div class="input-group">
                    <input autocomplete="new-password" type="email" name="email" id="email" required>
                    <label for="email">Email</label>
                </div>
                <input type="button" value="Reset" class="submit-btn">
            </form>
        </div>
        <div id="sign-up">
            <form action="" autocomplete="off" class="form">
                <a href="#" class="close">&times;</a>
                <h2>SignUp</h2>
                <div class="input-group">
                    <input autocomplete="new-password" type="text" name="Name" id="Name" required>
                    <label for="loginUser">Name</label>
                </div>
                <div class="input-group">
                    <input autocomplete="new-password" type="email" name="Email" id="Email" required>
                    <label for="passwordUser">Email</label>
                </div>
                <div class="input-group">
                    <input autocomplete="new-password" type="password" name="passwordUser" id="passwordUser" required>
                    <label for="passwordUser">Password</label>
                </div>
                <div class="input-group">
                    <input autocomplete="new-password" type="password" name="confrim-password" id="confrim-password" required>
                    <label for="passwordUser">Confirm Password</label>
                </div>
                <div class="input-group">
                    <select name="countrySelected" id="countrySelected">
                        @foreach ($countries as $cou)
                            <option value="{{ $cou->nicename }}">{{ $cou->nicename }}</option>
                        @endforeach
                    </select>
                    <label for="countrySelected">Select Country</label>
                </div>
                <div class="input-group">
                    <input autocomplete="new-password" type="number" name="phoneNumber" id="phoneNumber" required>
                    <label for="phoneNumber">Phone Number</label>
                </div>
                <input type="button" value="Create" class="submit-btn">
            </form>
        </div>
    </div>
    <script type="text/javascript">
        function update() {
            var select = document.getElementById('countrySelected');
            var option = select.options[select.selectedIndex];
            $countries.forEach(element => {
                if (element - > nicename == option) {
                    var option2 = document.getElementById('phoneNumber');

                }
            });
        }
        document.getElementById('phoneNumber').addEventListener("input", update);
    </script>
</body>

</html>
