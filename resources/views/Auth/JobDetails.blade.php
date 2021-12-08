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
    table tr td button{
        border-width: 0;
        background: rgba(59, 130, 246, .8);
        padding:10px 40px;
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


.profilepicture{
    
}

.jobtitle{
    align-items: center;
}

</style>
@include('layouts.header')

<body>
@csrf

    <br><br>
   {{-- @foreach ($Jobs as $key => $job)--}}
    
        
    
        <div class="div-1">
            
                <div class="profilepicture">
                   
                        <h1>Image</h1>
                        <h3>Company name</h3>
                        <p>comapny location</p>
                        <p>company email</p>
                          
                  
                
                
                    <div class="jobtitle">
                    
                    <h2>Job Title</h2>
                    <table border="0" cellpadding="5" cellspacing="0" align="center">
                        {{--<form action="/search" method="POST">--}}
                            <form action="/search" method="Get">
                            
                            <tr>
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
        <br><br>
       {{-- @endforeach--}}
    



</body>

</html>
