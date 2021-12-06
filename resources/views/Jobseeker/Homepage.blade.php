<!--display flex flex direction row align items center justify content between-->
<!DOCTYPE html>
<html>
<style>
    .oval {
        width: 160px;
        height: 40px;
        background: #fcfcfc;
        border-radius: 40px;
        border-block-color: #000000;
    }

    .div-1 {
        width: 60%;
        background: #f7f5f5;
        box-align: "center";
        padding: 20px 10px;
        border-radius: 20px;
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: space-between;
    }

</style>

<body>
    @csrf

    <table border="0" cellpadding="5" cellspacing="0" align="center">

        <tr>
            <td style="width: 50%" align="center">
                <form action="{{ url('/search') }}">
                    <input class="oval" name="job" type="text" maxlength="50"
                        style="width:100%;max-width: 260px" placeholder="What Job Title, Keywords, or company?"
                        required>
                </form>
            </td>
            <td>&nbsp;</td>
            <td style="width: 60%" align="center">
                <form action="{{ url('/search') }}">
                    <input class="oval" name="jobloc" type="text" maxlength="50"
                        style="width:100%;max-width: 260px" placeholder="Where country, city, or zip code?"
                        action="{{ url('/search') }}" required>
                </form>
            </td>

        </tr>

    </table>
    <br><br>


    <div class="div-1">
        <div class="profilepicture">
            <img src="" alt="image">

        </div>
        <div class="midcontainer">
            <h2>frontend react native developper</h2>
            <p>full time job(on site)</p>

        </div>
        <div class="rightcontainer">
            <h3>Andre Solution</h3>
            <p>Beirut-<a> andremawad.sarl.com</a></p>
            <p>email:andre@mawad.com</p>
        </div>

    </div>

    {{-- <table class="table table-bordered table-striped"  style="background-color:rgb(240, 240, 240)">
    <thead>
    </thead>
    <tbody>
        
        @foreach ($Jobs as $key => $job)
            
        <tr>
            <td>
                {{--{{dd($job)}} --}}
    {{-- {{$job[$key]->JobTitle}}
           </td>
        </tr>
        
        @endforeach

    </tbody>
</table> --}}



</body>

</html>
