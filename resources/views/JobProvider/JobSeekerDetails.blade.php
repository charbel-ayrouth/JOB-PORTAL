<!--display flex flex direction row align items center justify content between-->
<!DOCTYPE html>
<html>
<style>
    .div-1 {
        position: absolute;
        min-width: 70%;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        padding: 20px 25px;
        background: #f7f5f5;
        box-align: "center";
        padding: 15px 30px;
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: space-between;
        box-shadow: 1px 1px 1px 1px #f1f1f1;
        border-radius: 1rem;
        transition: box-shadow .2s ease-in-out;
    }

    .div-2 {
        border-radius: 10px;
        border: 5px solid #ffffff;
        border-color: #ffffff;
        width: 30%;
        padding-left: 10px;
        background: #f7f7f7;

    }

    .div-3 {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        top: 15%;
        border-radius: 10px;
        border: 5px solid #ffffff;
        border-color: #ffffff;
        width: 60%;
        padding-left: 10px;
        background: #f7f7f7;

    }

    .div-4 {
        top: 15%;
        border-radius: 10px;
        border: 5px solid #ffffff;
        /*border-color: #ffffff;*/
        width: 90%;
        padding-left: 10px;
        padding-right: 20px;
        background: #f7f7f7;
    }

    .div-5 {
        top: 15%;
        border-radius: 10px;
        border: 5px solid #ffffff;
        /*border-color: #ffffff;*/
        width: 90%;
        padding-left: 10px;
        padding-right: 20px;
        background: #f7f7f7;
    }

    .btn {
        color: #0099CC;
        background: transparent;
        border: 2px solid #03c0ff;
        border-radius: 6px;
        border: none;
        color: white;
        padding: 16px 32px;
        text-align: center;
        display: inline-block;
        font-size: 16px;
        margin: 4px 2px;
        -webkit-transition-duration: 0.4s;
        /* Safari */
        transition-duration: 0.4s;
        cursor: pointer;
        text-decoration: none;
        text-transform: uppercase;

    }

    .button {
        text-align: center;
        padding: 10px 0px;
    }

    .btn1 {
        background-color: white;
        color: black;
        border: 2px solid #02c0ff;
    }

    .btn1:hover {
        background-color: #06c1ff;
        color: white;
    }

    .left-side {
        display: flex;
        align-items: center;
        flex-direction: row;
        width: fit-content;
        max-width: 50%;
    }

    /*.left-side .profilepicture {
        margin-right: 10%;
    }*/
    .left-side .div-2 {
        margin-right: 10%;
    }

</style>
@include('layouts.header')

<body>
    @csrf
    <div class="div-1">
        <div class="div-2">
            <br>
            <img width="100" height="100" src="{{ URL('/storage/images/' . $Job_seeker->path) }}" alt="image">
            <h2>{{ $Job_seeker->name }}</h2>
            <p><i class="fas fa-envelope"></i>Email: {{ $Job_seeker->email }}</p>
            <p>Phone Number: {{ $Job_seeker->phoneNumber }}</p>
            <p>Location: {{ $Job_seeker->Country }},{{ $Job_seeker->city }}, {{ $Job_seeker->zipCode }},{{ $Job_seeker->Address }}
            </p>
        </div>
        <div class="div-3">
            <h1 align="center">{{ $Job_seeker->Field }}</h1>
            <div class="div-4">
                <h2>Experience:</h2>
                <ul>
                    <li>{{ $Job_seeker->Experience }}</li>
                </ul>
            </div>
            <br><br>
            <div class="div-5">
                <h2>Skills:</h2>
                <ul>
                    <li>{{ $Job_seeker->Skills }}</li>
                </ul>
            </div>
            <br><br>
            <div class="button">
                <form action="{{ route('JobProviderEmail') }}" method="POST">
                    @csrf
                    <input type="text" name="jid" hidden value={{ $Job_seeker->jid }}>
                    <button type="submit" class="btn btn1">Send Him An Interest</button>
                </form>
            </div>
        </div>
    </div>
    <script>
        var msg = '{{Session::get('message')}}';
        var exist = '{{Session::has('message')}}';
        if(exist){
          alert(msg);
        }
      </script>
</body>
</html>
