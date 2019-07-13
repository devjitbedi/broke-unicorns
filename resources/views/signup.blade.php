<!DOCTYPE html>
<html lang="en" dir="ltr">
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<head>
  <meta charset="utf-8">
  <title>Sign Up</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <link rel="stylesheet" href="../../css/app.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
</head>
<body>

<div class = "container-fluid">

  <div class = "row">
<div class = "col-12 col-md-7 login-graphic text-center">
   <a href="/" class="ml-5"> <img src="/images/SingleLineLogo.png" class = "login-logo mt-3"></a>
   

    
       <div id="carouselExampleIndicators" class="carousel" data-ride="false">
          <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
       
       
        <div class="carousel-inner">
          <div class="carousel-item text-center active">
            <img class="graphics" src="/images/BrokeUnicornsCreated.png" alt="Broke Unicorn Coming From Cloud">
             <div class="carousel-caption d-none d-block">
             <h5 class = "black">Cloud of Creation</h5>
             <p class = "gray">Transform your idea into a baby unicorn.</p>
             </div>
          </div>
          <div class="carousel-item">
            <img class="graphics" src="/images/LightningMeterStriking.png" alt="Lighting Striking The Broke Unicorn">
            <div class="carousel-caption d-none d-block">
             <h5 class = "black">Unicorn Lightning </h5>
             <p class = "gray">Strike lightning with a rating.</p>
             </div>
          </div>
          <div class="carousel-item">
            <img class="graphics" src="/images/MoonsFeedbackRays.png" alt="Feedback Rays From Moon">
            <div class="carousel-caption d-none d-block">
             <h5 class = "black">Feedback Rays</h5>
             <p class = "gray">Echo rays of feedback back to the creator.</p>
             </div>
          </div>


        </div>

    </div>


     

</div>
<div class = "col-12 col-md-5 mt-5 mb-5 login-text text-center">
  <a href = "/login" class = "btn-purple-outline float-right mt-2 mb-4 mb-md-0"> Login </a>
  <div class = "clear"> </div>
  <h2 class = "mt-md-5 mb-md-4 mb-4 big-title text-center">Explore this world.</h2>
  <form method="post">
    @csrf
    <div class="form-group text-left">
      <small class = "text-danger"> {{$errors->first('username')}} </small> <br>
      <label for="username" class = "gray">Creator</label>
      <input type="text" id="username" name="username" class="form-control" placeholder="ex. emusk">
    </div>
    <div class="form-group text-left">
      <label for="password" class = "gray">Password</label>
      <input type="password" id="password" name="password" class="form-control" placeholder="ex. spacexiscool1!">
    </div>
    <input type="submit" value="Sign Up" class="btn-purple-alt mt-2 mb-3">
    <a href="/" class = "link float-center">Cancel</a>    
  </form>

 
</div>
</div>



</div>




<script type="text/javascript" src = "../../js/app.js"></script>

</body>
</html>
