<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Validator;
use DateTime;
use DateTimeZone;
use Auth;

class HomeController extends Controller {

	public function index(Request $request) {



			$companies = DB::table('company')
			->selectRaw('company.id as id, company.logoURL as logoURL, company.name as name, users.username as username, company.userID as userID, AVG(rating.rating) as avg_rating, COUNT(rating.id) as total_rating')
			->join('users', 'users.id', '=', 'company.userID')
			->leftJoin('rating', 'rating.companyID', '=', 'company.id')
    		->where('company.status', '=', 1)
			->orWhere('company.archived', '=', 0)
			->groupBy('company.id')
			->orderBy('company.id', 'DESC')
			->get();
  


			return view('index', [

				'companies' => $companies
				
			]);
	}

	public function create() {

		$query = DB::table('industry')
		->orderBy('name', 'ASC');
		$industries = $query->get();

		$query = DB::table('category')
		->orderBy('name', 'ASC');
		$categories = $query->get();


		return view('create', [
				'categories' => $categories,
				'industries' => $industries
				
			]);
	}

	public function store(Request $request) {

			$input = $request->all();
			$validation = Validator::make($input, [

			'name' => 'required|unique:company,name',
			'description' => 'required|min:20|max:200',
			'content' => 'required|min:200',
			'industry' => 'required',
			'category' => 'required',
			'logo' => 'required',

		]);

		if ($validation->fails()) {

			return redirect('/create/')
			->withInput()
			->withErrors($validation);

		}

		$timestamp = new DateTime(date("Y-m-d H:i:s"));
		$timestamp->setTimeZone(new DateTimeZone('America/Los_Angeles'));


		DB::table('company')->insert([

			'userID' => Auth::user()->id,
			'name' => $request->name,
			'createTime' => $timestamp,
			'description' => $request->description,
			'content' => $request->content,
			'industryID' => $request->industry,
			'categoryID' => $request->category,
			'logoURL' => $request->logo,
			'status' => 1,
			'archived' => 0

		]);

		return redirect('/');
		
	}

}