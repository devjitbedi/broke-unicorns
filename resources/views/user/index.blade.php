<?php 

$name = 'No User Exists';

foreach($users as $user) {

$name = "User " . $user->username;
    
}


?>



@extends('layout')

@section('title', $name)

@section('main')



      <div class = "mt-5 col-12">
          	@forelse($users as $user)

          	@if ($user->id == $me->id)

            <div class = "user-heading">
             <p class = "company-by text-uppercase">Welcome,</p>

     <h2 class = "company-title"> {{$me->username}} </h2>


          @if ($avg_rating * 10 >= 9.5 && $total_rating >= 100)
     <img src = "../images/GoldHornUnicorn.png" class = "rating-icon">
     @elseif ($avg_rating * 10 >= 7.5 && $total_rating >= 50)
     <img src = "../images/RichUnicorn.png" class = "rating-icon">
     @else 
     <img src = "../images/BrokeUnicorn.png" class = "rating-icon">
     @endif

<br>

    <h4 class = "rating-avg"> <i class="fas fa-fire purple"></i> {{number_format($avg_rating * 10, 1, '.', '') == null ? "0" : number_format($avg_rating * 10, 1, '.', '')}}</h4>

    <h4 class = "rating-total"> <i class="fas fa-user-friends purple"></i> {{$total_rating == null ? "0" : $total_rating}}</h4>

 
   </div>

            @if (!$companies->isEmpty())        

           <div class = "col-12 ml-4 mb-1 mb-md-2 mt-md-5 new-company-title user-company-title">

            <p class = ""> Your most popular <hr> </p>

          </div>

          @endif
           

      		  @else
          	
            <div class = "user-heading">
             <p class = "company-by text-uppercase">Introducing,</p>

     <h2 class = "company-title"> {{$user->username}} </h2>


          @if ($avg_rating * 10 >= 9.5 && $total_rating >= 100)
     <img src = "../images/GoldHornUnicorn.png" class = "rating-icon">
     @elseif ($avg_rating * 10 >= 7.5 && $total_rating >= 50)
     <img src = "../images/RichUnicorn.png" class = "rating-icon">
     @else 
     <img src = "../images/BrokeUnicorn.png" class = "rating-icon">
     @endif

<br>

    <h4 class = "rating-avg"> <i class="fas fa-fire purple"></i> {{number_format($avg_rating * 10, 1, '.', '') == null ? "0" : number_format($avg_rating * 10, 1, '.', '')}}</h4>

    <h4 class = "rating-total"> <i class="fas fa-user-friends purple"></i> {{$total_rating == null ? "0" : $total_rating}}</h4>

 
   </div>

             @if (!$companies->isEmpty())     

            <div class = "col-12 ml-4 mb-1 mb-md-2 mt-md-5 new-company-title user-company-title">

            <p class = ""> Most popular <hr> </p>

            </div>

            @endif

            @endif

            @empty
            <h3> No users found. </h3>
             @endforelse
       </div>

   


<div class = "row cards-container">

       @forelse($companies as $company)

        <?php 

            $temp = $company->avg_rating * 10;
            $temp = number_format($temp, 1, '.', '');

            $date=date_create($company->createTime);
           $date = date_format($date,"M j");

        ?>

    <div class = "company-container col-12 col-sm-6 col-md-4 col-lg-3">
           <a href="/company/{{$company->id}}" class = "link">

            <div class = "company-card text-center">

                <div class="company-image">
                  <img src="{{$company->logoURL}}" class = "logo-home" />
                </div>

                <div class = "company-name mt-3">
                  <h4 class = "text-dark"> {{$company->name}} </h4>

                </div>
          

          </div>

        </a>


          <div class = "company-info mt-3 col-6 text-left">
            <p class = "by-line">on <span class = "text-uppercase font-weight-bold black">

             {{$date}} </span></p>

          </div>

          <div class = "company-info mt-3 text-right col-6 float-right">
            <p class = "font-weight-bold"> {{$temp}}</p>

          </div>


      </div>





      @empty 

      @forelse($users as $user)

      @if ($user->id == $me->id)
      <h5 class = "mt-5"> No companies found. Start <a href = "/create" class = "link">creating</a>.</h5>

      @else 

      <h5 class = "mt-5"> No companies found. </h5>

      @endif

      @empty
      
      @endforelse

      @endforelse

       @forelse($users as $user)

       @if ($user->id == $me->id)

        @if(!$companies->isEmpty())
<div class = "company-container mb-4 mb-sm-0 col-12 col-sm-6 col-md-4 col-lg-3">
      <a href="/create" class = "link">

      <div class = "company-card text-center">


                <div class="company-image">
                  <img src="http://pluspng.com/img-png/free-png-plus-sign-plus-icon-512.png" class = "logo-home" />
                </div>

                <div class = "company-name mt-3">
                  <h4 class = "text-dark"> Create </h4>
                </div>
          

          </div>
           </a>

  </div>

        @endif

         @if ($user->type == 'admin')

      <div class = "company-container mt-4 mt-sm-0 col-12 col-sm-6 col-md-4 col-lg-3">
      <a href="/admin" class = "link">

      <div class = "company-card text-center">


                <div class="company-image">
                  <img src="https://png.pngtree.com/svg/20170418/admin_1246350.png" class = "logo-home" />
                </div>

                <div class = "company-name mt-3">
                  <h4 class = "text-dark"> Admin </h4>
                </div>
          

          </div>
           </a>

        </div>

            @endif

        @endif

        @empty

        @endforelse


<div class = "col-12 mt-5 text-center">
            @forelse($users as $user)

            @if ($user->id == $me->id)

            <a href = "/logout" class = "btn-logout mb-3 mb-md-0"> Logout <i class="material-icons next-icon-logout">
navigate_next
</i> </a>

            @else
            

            @endif

            @empty
            
             @endforelse
 </div>

       
</div>














@endsection