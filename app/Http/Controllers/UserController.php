<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Auth;
use DB;

class UserController extends Controller
{
  public function index($id)
  {

  	$query = DB::table('users')
  	->Where("id", "=", $id);
	$users = $query->get();

	$query = DB::table('company')
  	->Where("userID", "=", $id);
	$companies = $query->get();

  $companies = DB::table('company')
      ->selectRaw('company.id as id, company.createTime as createTime, company.logoURL as logoURL, company.name as name, users.username as username, company.userID as userID, AVG(rating.rating) as avg_rating')
      ->join('users', 'users.id', '=', 'company.userID')
      ->leftJoin('rating', 'rating.companyID', '=', 'company.id')
      ->where('users.id', '=', $id)
      ->groupBy('company.id')
      ->orderBy('avg_rating', 'DESC')
      ->get();

      $total_rating = DB::table('rating')
      ->leftJoin('company', 'rating.companyID', '=', 'company.id')
      ->join('users', 'users.id', '=', 'company.userID')
      ->where('users.id', '=', $id)
     ->count('rating.rating');

     $avg_rating = DB::table('rating')
      ->leftJoin('company', 'rating.companyID', '=', 'company.id')
      ->join('users', 'users.id', '=', 'company.userID')
      ->where('users.id', '=', $id)
     ->avg('rating.rating');


    return view('user.index', [
      'me' => Auth::user(),
      'id' => $id,
      'users' => $users,
      'companies' => $companies,
      'avg_rating' => $avg_rating,
      'total_rating' => $total_rating,
    ]);
  }

  public function delete($id) {


      DB::table('rating')
            ->where([
          'userID' => $id
             ])
            ->delete();

            DB::table('comment')
            ->where([
          'userID' => $id
             ])
            ->delete();

            DB::table('users')
            ->where([
          'id' => $id
             ])
            ->delete();

      return redirect('/admin');
    

      }

}