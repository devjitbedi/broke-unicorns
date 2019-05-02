@extends('layout')

@section('title', 'Login')

@section('main')
  <h2 class = "mt-4">Login</h2>
  <p>Don't have an account? Please <a href="/signup" class = "link">Signup</a></p>
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
    <input type="submit" value="Login" class="btn btn-dark mt-3">
  </form>
@endsection