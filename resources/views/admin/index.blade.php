@extends('layout')

@section('title', 'Admin')

@section('main')

  <div class = "row mt-4">

    <div class = "col-12 text-center">

      <h3> Welcome, Admin </h3>
      <p class = "control-panel-nav link"> Control Panel </p>

    </div>

    <div class = "col-12 mt-3 text-center control-panel">

   <a href="/admin/industry/new" class = "btn btn-dark"> Add Industry </a>
   <a href="/admin/category/new" class = "btn btn-dark"> Add Category </a>

   </div>

    <div class = "col-12 mt-3 text-center">

    	<div class = "analytics"> 

    		<h1> {{$total_companies == null ? "0" : $total_companies}} </h1>
    		<h5> companies </h5>

    	</div>

    	<div class = "analytics"> 

    		<h1> {{$total_users == null ? "0" : $total_users}} </h1>
    		<h5> users </h5>

    	</div>

    	<div class = "analytics"> 

    		<h1> {{$total_ratings == null ? "0" : $total_ratings}} </h1>
    		<h5> ratings </h5>

    	</div>

    	<div class = "analytics"> 

    		<h1> {{$total_comments == null ? "0" : $total_comments}} </h1>
    		<h5> comments </h5>

    	</div>

    </div>



<div class = "col-12 col-md-6 mt-3 text-center">

	<table class = "table">

	<tr>
      <th>Company</th>
      <th>Status</th>
      <th>Ratings</th>
      <th>Comments</th>
      <th></th>
    </tr>
@foreach ($companies as $company)
    <tr>
        <td>
          <?php echo '<a href="/company/' . $company->id . '"' . 'class="link">' . $company->name .'</a>' ?> 
        </td>
        <td>
          {{$company->status}}
        </td>
        <td>
          {{$company->ratings == null ? "0" : $company->ratings}}
        </td>
        <td>
        {{$company->comments == null ? "0" : $company->comments}}
        </td>
       
        <td>

       <?php echo '<form action="/admin/delete/company/' . $company->id . '" method="post" class = "rating-item">' ?>
          @csrf
       <button type="submit" class="link-button link">
          <i class="far fa-trash-alt"></i>
        </button>
        </form>

        </td>
     </tr>

   @endforeach
      



	</table>

</div>

<div class = "col-12 col-md-6 mt-3 text-center">

	<table class = "table">

	<tr>
      <th>User</th>
      <th>Company</th>
      <th> Ratings </th>
      <th>Comments</th>
      <th></th>
    </tr>
@foreach ($users as $user)
    <tr>
        <td>
          <?php echo '<a href="/user/' . $user->id . '"' . 'class="link">' . $user->name .'</a>' ?> 
        </td>
        <td>
          {{$user->companies == null ? "0" : $user->companies}}
        </td>
        <td>
          {{$user->ratings == null ? "0" : $user->ratings}}
        </td>
         <td>
          {{$user->comments == null ? "0" : $user->comments}}
        </td>
        <td>

      <?php echo '<form action="/admin/delete/user/' . $user->id . '" method="post" class = "rating-item">' ?>
          @csrf
       <button type="submit" class="link-button link">
          <i class="far fa-trash-alt"></i>
        </button>
        </form>

        </td>
      </tr>
@endforeach

	</table>

</div>

</div>


@endsection