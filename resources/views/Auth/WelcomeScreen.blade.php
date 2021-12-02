<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/WelcomeScreen.css">
    <title></title>
</head>

<body>
    <div class="container">
        <div class="left-side">
            <div class="h1-wrapper">
                <h1>Find Your New Employee Of The Month.</h2>
                    <h1 id="second-header">Just Login.</h2>
                            <a href="">I am Recruiting!</a>
            </div>
        </div>
        <div class="right-side">
            <div class="h1-wrapper">
                <h1>We Can Make Your Future Better.</h2>
                    <h1 id="second-header">Just Login.</h2>
                        <form action="/Sign-In" method="POST">
                            @csrf
                            <input type="text" hidden name="roleId" value=2>
                            <button type="submit">Find A Job</a>
                        </form>
            </div>
        </div>
    </div>

</body>

</html>
