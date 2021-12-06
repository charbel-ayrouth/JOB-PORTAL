<!DOCTYPE html>
<html>
<style>
    body {

        padding-top: 80px;
        font-family: Arial, Helvetica, sans-serif;
    }

    * {
        box-sizing: border-box
    }

    form {
        width: 800px;
        margin: 0 auto;
    }

    /* Full-width input fields */
    input[type=text],
    input[type=password] {
        width: 100%;
        padding: 15px;
        margin: 5px 0 22px 0;
        display: inline-block;
        border: none;
        background: #f1f1f1;
    }

    input[type=text]:focus,
    input[type=password]:focus {
        background-color: #ddd;
        outline: none;
    }

    hr {

        border: 1px solid #f1f1f1;
        margin-bottom: 25px;
    }

    /* Set a style for all buttons */
    button {
        background-color: #757a80;
        color: white;
        padding: 14px 20px;
        margin: 8px 0;
        border: none;
        cursor: pointer;
        width: 100%;
        opacity: 0.9;
    }

    button:hover {
        opacity: 1;
    }

    /* Extra styles for the cancel button */
    .cancelbtn {
        padding: 14px 20px;
        background-color: #f44336;
    }

    /* Float cancel and signup buttons and add an equal width */
    .signupbtn {
        float: right;
        width: 50%;
    }

    /* Add padding to container elements */
    .container {
        padding: 16px;

    }

    /* Clear floats */
    .clearfix::after {
        content: "";
        clear: both;
        display: table;
    }

    /* Change styles for cancel button and signup button on extra small screens */
    @media screen and (max-width: 300px) {

        .cancelbtn,
        .signupbtn {
            width: 100%;
        }
    }



    /*upload file*/
    input[type="file"] {
        opacity: 0;
        -moz-opacity: 0;
        /* IE 5-7 */
        filter: alpha(Opacity=0);
        /* Safari  */
        -khtml-opacity: 0;
        /* IE 8 */
        -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";

    }

    .input-file {
        text-align: center;
        background-color: #757a80;
        color: #fff;
        display: block;
        width: 200px;
        height: 40px;
        font-size: 15px;
        color: #fff;
        padding: 10px;
        font-weight: bold;
        border-radius: 10px;
    }

</style>

<body>

    <form action="{{ route('JobSeekerApp') }}" method="POST" enctype="multipart/form-data"
        style="border:1px solid #ccc">
        @csrf
        <div class="container">
            <center>
                <h1>Job Seeker Application</h1>
                <p>Please fill in this form to create your application.</p>
            </center>
            <hr>

            <label for="degree"><b>Degree</b></label><br>
            <input type="text" maxlength="150" style="width:100%;" placeholder="Enter your Degree" name="degree"
                required>

            <label for="field"><b>Field</b></label><br>
            <input type="text" maxlength="150" style="width:100%;" placeholder="Enter your Field" name="field" required>

            <table border="0" cellpadding="5" cellspacing="0">
                <tr>
                    <td style="width: 50%">
                        <label for="experience"><b>Experiences:</b></label><br />
                        <textarea name="experience" rows="7" cols="40" style="width:100%;max-width: 535px"></textarea>
                    </td>
                    <td>&nbsp;&nbsp;</td>
                    <td style="width: 60%">
                        <label for="skills"><b>Skills:</b></label><br />
                        <textarea name="skills" rows="7" cols="40" style="width:100%;max-width: 535px"></textarea>
                    </td>
                </tr>
            </table>
            <table border="0" cellpadding="5" cellspacing="0">
                <tr>
                    <td style="width: 500px">
                        <b>Upload Your CV:</b>
                        <br><br>
                        <label class="input-file">Choose File
                            <input type="file" name="cv" />
                        </label>
                    </td>

                    <td>
                        <b>Upload Your Profile Picture:</b>
                        <br><br>
                        <label class="input-file">Choose Picture
                            <input type="file" name="path" /></label>

                    </td>
                </tr>
            </table>
            <br><br><br>
            <div class="clearfix">
                <button type="submit">Submit</button>
            </div>
        </div>
    </form>

</body>

</html>
