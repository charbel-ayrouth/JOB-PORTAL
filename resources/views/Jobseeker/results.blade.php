<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>Document</title>
</head>

<body>
    {{-- <!DOCTYPE html> --}}
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <title>Edit</title>
    </head>

    <body>
        <div class="w-4/12 mx-auto  mt-20">
            <h1>Results of your test</h1>
            <div>Total points: {{ $result->total_points }} points</div>
        </div>
    </body>


    </html>

</body>

</html>
