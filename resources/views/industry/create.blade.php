@extends('layout')

@section('title', 'Create Industry')

@section('main')

  <div class="row">
    <div class="col mt-4 mb-5">
      <h2 class = "mt-4">Create an Industry</h2>
      <form action="/admin/industry" method="post">
        @csrf
        <div class="form-group" >

          <label for="name">Name</label> 
          <small class = "text-danger"> {{$errors->first('name')}} </small>
          <input type="text" id = "name" name="name" class="form-control" value = "{{old('name')}}">
          
          
        </div>
        <button type="submit" class="btn btn-dark mt-4">
          Create
        </button>
      </form>
    </div>
  </div>
@endsection