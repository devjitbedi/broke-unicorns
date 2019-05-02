<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use Validator;
use DateTime;
use DateTimeZone;
use Auth;

class RatingController extends Controller
{

	 public function __construct()
    {
        $this->middleware('auth');
    }


  public function store($companyID, $rating, Request $request) {

			$input = $request->all();

			$timestamp = new DateTime(date("Y-m-d H:i:s"));
		    $timestamp->setTimeZone(new DateTimeZone('America/Los_Angeles'));

			$query = DB::table('rating')
			->where([
       		'companyID' => $companyID,
       		'userID' => Auth::user()->id
             ]);
		
			$rating_exists = $query->first();
		

		if ($rating_exists != NULL) {

			DB::table('rating')
            ->where([
       		'companyID' => $companyID,
       		'userID' => Auth::user()->id
             ])
            ->update(['rating' => $rating,
            		  'createTime' => $timestamp
        				]);

		}

		else {

		DB::table('rating')->insert([

			'companyID' => $companyID,
			'userID' => Auth::user()->id,
			'rating' => $rating,
			'createTime' => $timestamp

		]);

		}

		return redirect('/company/' . $companyID);
		
	}
}