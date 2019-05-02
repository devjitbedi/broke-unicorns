<?php 

$title = 'No Company Exists';
$companyID = $id;

foreach($companies as $company) {

$title = $company->name . ' company';
$name = $company->username;
$userid = $company->userID;
$date=date_create($company->createTime);
$date = date_format($date,"M j");

}


?>


@extends('layout')

@section('title', $title)

@section('main')

  <div class = "row justify-content-center mt-4">

      <div class = "col-12 col-md-10 col-lg-9 col-xl-7 intro">

    @foreach($companies as $company)
     
     <p class = "company-by text-uppercase ml-1">
      A <?php echo '<a href="/user/' . $userid . '"' . 'class="link">' . $name .'</a>' ?> company

    </p>

     <h2 class = "company-title"> {{$company->name}} </h2>


     @if ($avg_rating > 9.5 && $total_rating > 20)
     <img src = "../images/GoldHornUnicorn.png" class = "rating-icon">
     @elseif ($avg_rating > 7.5 && $total_rating > 10)
     <img src = "../images/RichUnicorn.png" class = "rating-icon">
     @else 
     <img src = "../images/BrokeUnicorn.png" class = "rating-icon">
     @endif

     <h5 class = "company-desc ml-1"> {{$company->description}} </h5>

     <h4 class = "rating-avg"> <i class="fas fa-fire purple"></i> {{$avg_rating == null ? "0" : $avg_rating}}</h4>

    <h4 class = "rating-total"> <i class="fas fa-user-friends purple"></i> {{$total_rating == null ? "0" : $total_rating}}</h4>

     <div class = "tags mt-3">
      <p class = "industry-tag"> {{$company->industry}} </p> 
      <p class = "category-tag"> {{$company->category}} </p>
    </div>

    <hr>

     <div class = "content-section">

          <p class = "content"> {{$company->content}} </p>


      <small class = "text-uppercase"> created on <span class = "font-weight-bold"> <?php echo $date ?> </span> by <?php echo '<a href="/user/' . $userid . '"' . 'class="link">' . $name .'</a>' ?></small>

      </div>

     </div>

      

      


       </div>

    <hr class = "col-12 col-md-10 col-lg-9 col-xl-7 hr-rating">

     <div class = "rating-section text-center">

      <h3 class = "text-uppercase umeter"> <span class = "bigger">T</span>he <span class = "bigger">U</span>nicorn<span class = "bigger">M</span>eter </h3>

      <img src = "{{$company->logoURL}}" class = "logo-detail">

     <div class = "rating">
      
      <?php echo '<form action="/rating/' . $companyID . '/1" method="post" class = "rating-item">' ?>
        @csrf
       <button type="submit" class="btn btn-light mt-4 rich-rating">
          <img src = "../images/RichUnicorn.png">
        </button>
    </form>

     <?php echo '<form action="/rating/' . $companyID . '/0" method="post" class = "rating-item">' ?>
      @csrf
       <button type="submit" class="btn btn-light mt-4 broke-rating">
          <img src = "../images/BrokeUnicorn.png">
        </button>
    </form>

        </div>


    @endforeach

 </div>


    <hr class = "col-12 col-md-10 col-lg-9 col-xl-7">

    <div class = "row justify-content-center">

    <div class = "col-12 col-md-10 col-lg-9 col-xl-7 comments-section mb-5"> 

      <h4> Discussion </h4>
      <?php echo '<form action="/comment/' . $companyID . '" method="post">' ?>
        @csrf
        
          <small class = "text-danger"> {{$errors->first('description')}} </small>
          <textarea id = "comment" name="comment" class="form-control mt-2" rows="1" cols="20" placeholder="Add your thoughts...">{{old('comment')}}</textarea>
       <button type="submit" class="btn btn-dark post-button">
          Post
        </button>
    </form>

<a id = "comments_area">

    <div class = "display-comments">

      @forelse($comments as $comment)

      <?php 

       $date_comment=date_create($comment->createTime);
       $date_comment = date_format($date_comment,"F jS, Y • g:i A");

       ?>

      @if ($comment->userID == $me)

        <small class = "my-comment-date time">{{$date_comment}} </small> <br>
      <p class = "my-comment com"> {{$comment->content}} </p> <br>

      <div class = "clear"> </div>

      @else 

      <small class = "time">{{$date_comment}} </small> <br>
      <p class = "comment com"> {{$comment->content}} </p> <br>
      <small> by 

      <?php echo '<a href="/user/' . $comment->userID . '"' . 'class="link">' . $comment->name .'</a>' ?> 

       </small>
      <br>

      @endif

      @empty

      <h5 class = "mt-5 mb-5 text-center font-italic">Start the discussion </h5>

      @endforelse
    </div>

    </div> </a>

  </div>

</div>



@endsection