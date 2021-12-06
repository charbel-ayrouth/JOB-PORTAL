<html>
<body>
    <div class="row">
        <div class="col-md-12">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                 
                
                    
                    <form class="form-inline" action="{{url('/search')}}">
                        <input class="form-control mr-sm-2" type="text" name="search"/> 
                        <button class="btn btn-primary my-2 my-sm-0" type="submit">
                            Search
                        </button>
                    </form>
                    
                
            </nav>
        </div>
    </div>


<div class="container-fluid">
<div class="row">
    <div class="col-md-12">
        <div class="card">
            
            <div class="card-body">

                <table class="table table-bordered table-striped"  style="background-color:rgb(240, 240, 240)">
                    <thead>
                    </thead>
                    <tbody>
                        
                        @foreach ($j as $job)
                            @foreach($l as $location)
                        <tr>
                            <td>
                                {{$job->JobTitle}}
                           </td>
                           {{--<td>
                                {{$job->Field}}
                            </td>
                            <td>
                                {{$job->Description}}
                            </td>
                            <td>
                                {{$job->Requirements}}
                            </td>
                            <td>
                                {{$job->JobSkillLevel}}
                            </td>
                            <td>
                                {{$job->ValidationTime}}
                            </td>
                            <td>
                                {{$location->country}}
                            </td>
                            <td>
                                {{$location->city}}
                            </td>
                            <td>
                                {{$location->ZipCode}}
                            </td>--}}
                        </tr>
                        @endforeach
                        @endforeach

                    </tbody>
                </table>
            
            </div>
        </div>
    </div>
</div>
</div>