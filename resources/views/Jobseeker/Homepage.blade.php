<!DOCTYPE html>
<html>
    <style>
    .oval {
     width: 160px;
     height: 80px;
     background: #fcfcfc;
     border-radius: 40px;
     border-block-color: #000000;
        }
    </style>
    <body>
        @csrf
        {{--<form class="form-inline" action="{{url('/search')}}">
            <input class="form-control mr-sm-2" type="text" name="search"/> 
            <button class="btn btn-primary my-2 my-sm-0" type="submit">
                Search
            </button>
        </form>--}}
        <table border="0" cellpadding="5" cellspacing="0" align="center">
           {{-- <form action="{{url('/search')}}">--}}
        <tr>
            <td style="width: 50%" align="center">
                <form action="{{url('/search')}}">
                <input class="oval" name="job" type="text" maxlength="50" style="width:100%;max-width: 260px" placeholder="What Job Title, Keywords, or company?"  required>
                </form>
            </td> 
            <td>&nbsp;</td>
            <td style="width: 60%" align="center">
              <form action="{{url('/search')}}">
                <input class="oval" name="jobloc" type="text" maxlength="50" style="width:100%;max-width: 260px" placeholder="Where country, city, or zip code?" action="{{url('/search')}}" required>
                </form>
            </td>  
        
        </tr> 
    {{--</form>--}}
    </table>
<br><br>

<table class="table table-bordered table-striped"  style="background-color:rgb(240, 240, 240)">
    <thead>
    </thead>
    <tbody>
        
        @foreach ($job as $job)
            
        <tr>
            <td>
                {{$job->JobTitle}}
           </td>
        </tr>
        
        @endforeach

    </tbody>
</table>



    </body>
</html>