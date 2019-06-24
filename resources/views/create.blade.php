<!-- <head>
   <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
   <script>tinymce.init({ selector:'textarea' });</script>
</head> -->

@extends('layout')

@section('title', 'Create Unicorn')

@section('main')

  <div class="row">
    <div class="col mt-4 mb-5">
      <h2 class = "mt-2">Create a Unicorn</h2>
      <form action="/" method="post">
        @csrf
        <div class="form-group" >

          <label for="name">Name</label> 
          <small class = "text-danger"> {{$errors->first('name')}} </small>
          <input type="text" id = "name" name="name" class="form-control" value = "{{old('name')}}">
          

          <label class = "mt-3" for="name">Description</label>
          <small class = "text-danger"> {{$errors->first('description')}} </small>
          <input type="text" id = "description" name="description" class="form-control" value = "{{old('description')}}">
          

          <label class = "mt-3" for="name">Content</label>
          <small class = "text-danger"> {{$errors->first('content')}} </small>
          <textarea id = "content" name="content" class="form-control" rows="10" cols="30">{{old('content')}}</textarea>
          

          <label for="name" class = "mt-3">Industry</label>
          <small class = "text-danger"> {{$errors->first('industry')}} </small>
          <select class="form-control" id="industry" name= "industry">
            @foreach($industries as $industry)
            <option value="{{$industry->id}}" {{$industry->id == old('industry') ? "selected" : ""}}>
              {{$industry->name}}
            </option>
            @endforeach
          </select>
          

          <label for="name" class = "mt-3">Category</label>
          <small class = "text-danger"> {{$errors->first('category')}} </small>
          <select class="form-control" id="category" name= "category">
            @foreach($categories as $category)
            <option value="{{$category->id}}" {{$category->id== old('category') ? "selected" : ""}}>{{$category->name}}</option>
            @endforeach
          </select>
          

          <label for="name" class = "mt-3">Logo</label>
          <small class = "text-danger"> {{$errors->first('logo')}} </small>
          <input type="text" id = "logo" name="logo" class="form-control" value = "{{old('logo')}}">
          
          
        
        </div>
        <button type="submit" class="btn btn-dark mt-4">
          Create
        </button>
      </form>
    </div>
  </div>
@endsection