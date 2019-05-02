@extends('layout')

@section('title', 'Sign Up')

@section('main')
  <h2 class = "mt-4">Sign Up</h2>
  <p>Already have an account? Please <a href="/login" class = "link">Login</a></p>
  <form method="post">
    @csrf
    <div class="form-group">
      <label for="username">Username</label>
      <input type="text" id="username" name="username" class="form-control">
    </div>
    <div class="form-group">
      <label for="password">Password</label>
      <input type="password" id="password" name="password" class="form-control">
    </div>
    <input type="submit" value="Sign Up" class="btn btn-dark mt-3">
  </form>
@endsection
