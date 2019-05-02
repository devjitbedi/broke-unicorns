<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use Validator;

class IndustryController extends Controller
{

	 public function __construct()
    {
        $this->middleware('auth');
    }
    
  public function create()
  {
    return view('industry.create');
  }


  public function store(Request $request) {

			$input = $request->all();
			$validation = Validator::make($input, [

			'name' => 'required|min:4|unique:industry,name'

		]);

		if ($validation->fails()) {

			return redirect('/admin/industry/new')
			->withInput()
			->withErrors($validation);

		}


		DB::table('industry')->insert([

		
			'name' => $request->name
			

		]);

		return redirect('/admin');
		
	}
}