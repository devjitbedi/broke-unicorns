<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;
use Hash;
use Auth;
use DB;

class SignUpController extends Controller
{

  public function index()
  {
    return view('signup');
  }


  public function signup()
  {
    $user = new User();
    $user->username = request('username');
    $user->password = Hash::make(request('password')); 
    $user->save();
    
    Auth::login($user);

    return redirect('/user/' . $user->id);

    
  }
}