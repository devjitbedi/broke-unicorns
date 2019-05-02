<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use Validator;
use DateTime;
use DateTimeZone;
use Auth;

class CommentController extends Controller
{

	 public function __construct()
    {
        $this->middleware('auth');
    }


  public function store($companyID, Request $request) {

			$input = $request->all();

			$timestamp = new DateTime(date("Y-m-d H:i:s"));
		    $timestamp->setTimeZone(new DateTimeZone('America/Los_Angeles'));

			$validation = Validator::make($input, [

			'comment' => 'required'

		]);

		if ($validation->fails()) {

			return redirect('/company/' . $companyID)
			->withInput()
			->withErrors($validation);

		}
		

		DB::table('comment')->insert([

			'companyID' => $companyID,
			'userID' => Auth::user()->id,
			'content' => $request->comment,
			'createTime' => $timestamp,
			'archived' => 0

		]);

		

		return redirect('/company/' . $companyID . '#comments_area');
		
	}
}