


@extends('layout')

@section('title', 'Broke Unicorns')

@section('main')

<div class = "row justify-content-center mt-4">

    <div class = "col-12 title">

      <h6 class = "text-uppercase"> billion dollar ideas </h6>
      <h1 class = "mb-2"> All unicorns were broke once. </h1>
      <a href = "/create" class = "btn-purple"> Start Creating <i class="material-icons next-icon">
navigate_next
</i> </a>


    </div>




    

    <div class = "row cards-container mt-5">

  <div class = "col-12 mb-1 mb-md-2 new-company-title">

    <p class = ""> Welcome our newest unicorns <hr> </p>

  </div>

       @forelse($companies as $company)

       <?php 

        $temp = $company->avg_rating * 10;
        $temp = number_format($temp, 1, '.', '');
        $total = $company->total_rating

        ?>



        
        <div class = "company-container col-12 col-sm-6 col-md-4 col-lg-3">
           <a href="/company/{{$company->id}}" class = "link">

            <div class = "company-card text-center">


      <div class = "unicorn-icon-2"> @if ($temp >= 9.5 && $total >= 20)
     <img src = "../images/GoldHornUnicorn.png" class = "rating-home-icon-2">
     @elseif ($temp >= 7.5 && $total >= 10)
     <img src = "../images/RichUnicorn.png" class = "rating-home-icon-2">
     @else 
     <img src = "../images/BrokeUnicorn.png" class = "rating-home-icon-2">
     @endif
   </div>

                <div class="company-image">
                  <img src="{{$company->logoURL}}" class = "logo-home" />
                </div>

                <div class = "company-name mt-3">
                  <h4 class = "text-dark"> {{$company->name}} </h4>

                </div>
          

          </div>

        </a>

          <div class = "company-info mt-3 col-6">
            <p class = "by-line"> by <span class = "text-uppercase font-weight-bold black">

              <?php echo '<a href="/user/' . $company->userID . '"' . 'class="link">' . $company->username .'</a>' ?></span></p>

          </div>

          <div class = "company-info mt-3 text-right col-6 float-right">
            <p class = "font-weight-bold"> {{$temp}}</p>

          </div>


      </div>








   @empty

   <p> No companies found. </p>

   @endforelse

</div>

</div>



@endsection