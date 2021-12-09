<!--display flex flex direction row align items center justify content between-->
<!DOCTYPE html>
<html>
<style>


    .div-1 {
        width: 70%;
        /*background: #f7f5f5;*/
        background: #ffffff;

        box-align: "center";
        padding: 15px 30px;
        /*border-radius: 20px;*/
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: space-between;
        margin: auto;
        box-shadow: 1px 1px 1px 1px #f1f1f1;
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
        top:15%;
        border-radius: 10px;
        border: 5px solid #ffffff;
        border-color: #ffffff;
        width: 60%;
        padding-left: 10px;
        background: #f7f7f7;
        
    }

    .div-4 {
        top:15%;
        border-radius: 10px;
        border: 5px solid #ffffff;
        /*border-color: #ffffff;*/
        width: 90%;
        padding-left: 10px;
        padding-right: 20px;
        background: #f7f7f7;
    }

    .div-5 {

        top:15%;
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

    <br><br>

    
   @foreach ($Jobs as $key => $job)
   @foreach ($providers as $prov)
   {{--dd($Jobs)--}}
       @if ($prov->jid == $Jobs->Jobprovider_id)
    
        <div class="div-1">
            <div class="div-2">
                <br>
                <img width="100" height="100" src="{{ URL('/storage/images/' . $prov->path) }}"
                    alt="image">
                <h2>{{$prov->name}}</h2>
                <a  href="mailto:{{$prov->email}}"><i class="fas fa-envelope" ></i>{{$prov->email}}  </a>
               
                <p>{{$prov->phoneNumber}}</p>
               <p>Location: {{$Jobs->Country}},{{$Jobs->city}}, {{$Jobs->zipCode}},{{$Jobs->Address}}</p>
            </div>

            <div class="div-3">
                <h1 align="center">{{$Jobs->JobTitle}}</h1>
                <div class="div-4">
                <h2>Description:</h2>
                <ul>
                    <li>{{$Jobs->Description}}</li>
                </ul>
                
                </div>
                <br><br>
                <div class="div-5">
                    <h2>Requirements:</h2>
                    <ul>
                        <li>{{$Jobs->Requirements}}</li>
                    </ul>
                </div>
                <br><br>
                <div class="button">
                    <button type="submit" class="btn btn1">Apply For Job</button>
                    
                </div>
            </div>

            

        </div>
        @endif
           @endforeach
           @endforeach

             {{--   <div class="profilepicture">
                   
                        <h1>Image</h1>
                        <h3>Company name</h3>
                        <p>comapny location</p>
                        <p>company email</p>
                          
                  
                
                
                    <div class="jobtitle">
                    
                    <h2>Job Title</h2>
                    <table border="0" cellpadding="5" cellspacing="0" align="center">--}}
                        {{--<form action="/search" method="POST">--}}
                          {{--  <form action="/search" method="Get">--}}
                            
                        {{--    <tr>
                                <td style="width: 50%" align="center">
                                    <p>Job Skills Levels</p>
                                    
                                </td>
                                <td>
                                    &nbsp;&nbsp;&nbsp;
                                </td>
                                <td style="width: 50%" align="center">
                                    <p>Job Description</p>
                                    
                                </td>
                        </tr>
                    </form>
                    </table>
                      
            
            
        </div>
        <br><br>--}}
       {{-- @endforeach--}}
    



</body>

</html>
