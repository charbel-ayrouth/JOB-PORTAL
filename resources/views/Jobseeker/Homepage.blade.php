<!--display flex flex direction row align items center justify content between-->
<!DOCTYPE html>
<html>
<style>
    .oval {
        margin-top: 2%;
        width: 160px;
        background: #fcfcfc;
        border-radius: 10px;
        border-block-color: #000000;
        padding: 10px 10px;
    }

    .div-1 {
        width: 70%;
        background: #f7f5f5;
        box-align: "center";
        padding: 15px 30px;
        border-radius: 20px;
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: space-between;
        margin: auto;
        box-shadow: 1px 1px 1px 1px #888888;
        transition: box-shadow .2s ease-in-out;
    }

    table tr td button {
        border-width: 0;
        background: rgba(59, 130, 246, .8);
        padding: 10px 40px;
        border-radius: 10px;
        color: white;
    }

    .div-1:hover {
        box-shadow: 0px 0px 0px 0px #888888;
        cursor: pointer;
        border-color: rgba(59, 130, 246, .8);
        border-width: 1px;
        border-style: solid;
    }

    .left-side {
        display: flex;
        align-items: center;
        flex-direction: row;
        width: fit-content;
        max-width: 50%;
    }

    .left-side .profilepicture {
        margin-right: 10%;
    }

</style>
@include('layouts.header')

<body>
    @csrf
    <table border="0" cellpadding="5" cellspacing="0" align="center">
        {{-- <form action="/search" method="POST"> --}}
        <form action="/search" method="Get">
            @csrf
            <tr>
                <td style="width: 50%" align="center">
                    <input class="oval" name="job" type="text" maxlength="50"
                        style="width:100%;max-width: 260px" placeholder="What Job Title, Keywords, or company?">
                </td>
                <td>
                    <button type="submit">Search</button>
                </td>
                <td style="width: 60%" align="center">
                    <input class="oval" name="jobloc" type="text" maxlength="50"
                        style="width:100%;max-width: 260px" placeholder="Where country, city, or zip code?">
                </td>
            </tr>
        </form>
    </table>
    <br><br>
    
    @foreach ($Jobs as $key => $job)
        @foreach ($providers as $prov)
            @if ($prov->jid == $job->Jobprovider_id)
                <a href="{{ route('JobDetail',['id'=>$job->id]) }}">
                    <div class="div-1">
                        <div class="left-side">
                            <div class="profilepicture">
                                <img width="100" height="100" src="{{ URL('/storage/images/' . $prov->path) }}"
                                    alt="image">
                            </div>
                            <div class="midcontainer">
                                <h2>{{ $job->JobTitle }}</h2>
                                <p>{{ $job->JobSkillLevel }}</p>
                            </div>
                        </div>
                        <div class="rightcontainer">
                            <h3>{{ $prov->CompanyTitle }}</h3>
                            <p>Email: {{ $prov->email }}</p>
                            <p>{{ $job->Country . '-' . $job->city }}</p>
                        </div>
                    </div>
                    <br><br>
            @endif
        @endforeach
    @endforeach
    </a>


</body>

</html>
