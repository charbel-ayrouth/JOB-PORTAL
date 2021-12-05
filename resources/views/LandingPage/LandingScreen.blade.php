<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/style.css" />
    <title>Split Landing Page
    </title>
  </head>
  <body>
    <div class="container">
      <div class="split left">
        <h1>Job Recruiter</h1>
        <a href="{{ route('LoginPageRecruiter') }}" class="btn">Recruit Now</a>
      </div>
      <div class="split right">
        <h1>Job Seeker</h1>
        <a href="{{ route('LoginPageSeeker') }}" class="btn">Find A Job</a>
      </div>
    </div>

    <script src="js/script.js"></script>
  </body>
</html>
