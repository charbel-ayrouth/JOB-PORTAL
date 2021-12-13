<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>Document</title>
</head>

<body class="h-screen flex items-center justify-center" style="background: #edf2f7;">

    <div class="w-6/12 mx-auto bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
        <h1 class="mb-4 font-bold text-2xl">Results of your test</h1>
        <p class="font-semibold">Total points: {{ $result->total_points }} points</p>
    </div>


</body>

</html>
