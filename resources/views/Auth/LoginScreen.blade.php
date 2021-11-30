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
        <form  action="" class="form">
            <img src="/img/avatar.jpg" alt="">
            <h2>Login</h2>
            <div class="input-group">
                <input type="text" name="loginUser" id="loginUser" required>
                <label for="loginUser">UserName</label>
            </div>
            <div class="input-group">
                <input type="password" name="passwordUser" id="passwordUser" required>
                <label for="passwordUser">Password</label>
            </div>
            <input type="button" value="Login" class="submit-btn">
            <a href="#forgot-pw" class="forgot-pw">Forgot Password?</a>
        </form>
        <div id="forgot-pw">
            <form action="" class="form">
                <a href="#" class="close">&times;</a>
                <h2>Reset Password</h2>
                <div class="input-group">
                    <input type="email" name="email" id="email" required>
                    <label for="email">Email</label>
                </div>
                <input type="button" value="Reset" class="submit-btn">
            </form>
        </div>
    </div>
</body>
</html>