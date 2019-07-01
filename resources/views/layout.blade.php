<!DOCTYPE html>
<html lang="en" dir="ltr">
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<head>
  <meta charset="utf-8">
  <title>@yield('title')</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <link rel="stylesheet" href="../../css/app.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
</head>
<body>

<div class = "container-fluid">

<a href="/" class="ml-2"> <img src="/images/SingleLineLogo.png" class = "home-logo mt-3"></a>
        
	
	<ul class="nav float-right">
    
      @if (Auth::check())
        <li class="nav-item">
          @if (Auth::user()->isAdmin())
          <?php echo '<a href="/user/' . Auth::user()->id . '"' . 'class="nav-link mt-1"> <img src = "/images/GoldHornUnicorn.png" class = "user-logo-alt"> </a>'?>
          @else
          <?php echo '<a href="/user/' . Auth::user()->id . '"' . 'class="nav-link mt-1"> <img src = "/images/BrokeUnicorn.png" class = "user-logo"> </a>'?>
          @endif
        </li>
        
        @else
        <li class="nav-item nav-link-alt">
          <a href="/login" class="nav-link mt-3">Login</a>
        </li>
        <li class="nav-item nav-link-alt">
          <a href="/signup" class="nav-link mt-3">Sign Up</a>
        </li>
      @endif
    </ul>


	@yield('main')



</div>




<script type="text/javascript" src = "../../js/app.js"></script>

</body>
</html>