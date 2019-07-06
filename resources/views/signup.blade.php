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
   <a href="/" class="ml-2"> <img src="/images/SingleLineLogo.png" class = "login-logo mt-3"></a>
 
    
       <div id="carouselExampleIndicators" class="carousel" data-ride="false">
          <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
       
       
        <div class="carousel-inner">
          <div class="carousel-item text-center active">
            <img class="graphics" src="/images/BrokeUnicornsInTheNight.png" alt="Broke Unicorn">
             <div class="carousel-caption d-none d-block">
             <h5 class = "black">The Incubator</h5>
             <p class = "gray">Baby broke unicorns are created everyday.</p>
             </div>
          </div>
          <div class="carousel-item">
            <img class="graphics" src="/images/RichUnicornsInTheNight.png" alt="Rich Unicorn">
            <div class="carousel-caption d-none d-block">
             <h5 class = "black">The UnicornCenter</h5>
             <p class = "gray">Some unicorns stay broke and some don't.</p>
             </div>
          </div>
          <div class="carousel-item">
            <img class="graphics" src="/images/GoldHornUnicornInTheNight.png" alt="Gold Horned Unicorn">
            <div class="carousel-caption d-none d-block">
             <h5 class = "black">Discussion Center</h5>
             <p class = "gray">Although, one unicorn is above the rest.</p>
             </div>
          </div>


        </div>

    </div>


     

</div>
<div class = "col-12 col-md-5 mt-5 mb-5 login-text text-center">
  <a href = "/login" class = "btn-purple-outline float-right mb-4 mb-md-0"> Login </a>
  <div class = "clear"> </div>
  <h2 class = "mt-md-5 mb-md-5 mb-4 big-title text-center">Welcome, newcomer.</h2>
  <form method="post">
    @csrf
    <div class="form-group text-left">
      <label for="username">Creator</label>
      <input type="text" id="username" name="username" class="form-control" placeholder="Pretty sure you know what to put here">
    </div>
    <div class="form-group text-left">
      <label for="password">Password</label>
      <input type="password" id="password" name="password" class="form-control" placeholder="Better not forget this">
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
