<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;
use Hash;
use Auth;
use DB;
use Validator;

class SignUpController extends Controller
{

  public function index()
  {
    return view('signup');
  }


  public function signup(Request $request)
  {
  
    
    $input = $input = $request->all();
    $validation = Validator::make($input, [

      'username' => 'required|min:4|max:10|unique:users,username',
      'password' => 'required|min:6'

    ]);

    if ($validation->fails()) {

      return redirect('/signup')
      ->withInput()
      ->withErrors($validation);

    }

    $user = new User();
    $user->username = $request->username;
    $user->password = Hash::make($request->password); 
    $user->save();
    
    Auth::login($user);

    return redirect('/user/' . $user->id);

    
  }
}