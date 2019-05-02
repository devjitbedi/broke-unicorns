<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Auth;
use DB;

class AdminController extends Controller
{

	 public function __construct()
    {
        $this->middleware('auth');
    }

  public function index()
  {

  	$total_companies = DB::table('company')
     ->count('id');

     $total_users = DB::table('users')
     ->count('id');

     $total_ratings = DB::table('rating')
     ->count('id');

     $total_comments = DB::table('comment')
     ->count('id');


     $companies = DB::table('company')  
     ->select(DB::raw("company.id as id, company.name as name, company.status as status, COUNT(DISTINCT rating.id) as ratings, COUNT(DISTINCT comment.id) as comments"))
      ->leftJoin('rating', 'company.id', '=', 'rating.companyID')
      ->leftJoin('comment', 'company.id', '=', 'comment.companyID')
      ->groupBy('company.id')            
      ->get();

      $users = DB::table('users')  
     ->select(DB::raw("users.id as id, users.username as name, COUNT(DISTINCT company.id) as companies, COUNT(DISTINCT rating.id) as ratings, COUNT(DISTINCT comment.id) as comments"))
      ->leftJoin('company', 'company.userID', '=', 'users.id')
      ->leftJoin('rating', 'users.id', '=', 'rating.userID')
      ->leftJoin('comment', 'users.id', '=', 'comment.userID')
      ->groupBy('users.id')            
      ->get();


    return view('admin.index', [

				'total_companies' => $total_companies,
				'total_users' => $total_users,
				'total_ratings' => $total_ratings,
				'total_comments' => $total_comments,
				'companies' => $companies,
        'users' => $users,
				
			]);
  }
}