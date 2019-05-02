<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use Validator;

class CategoryController extends Controller
{

	 public function __construct()
    {
        $this->middleware('auth');
    }
    
 public function create()
  {
    return view('category.create');
  }


  public function store(Request $request) {

			$input = $request->all();
			$validation = Validator::make($input, [

			'name' => 'required|min:4|unique:category,name'

		]);

		if ($validation->fails()) {

			return redirect('/admin/category/new')
			->withInput()
			->withErrors($validation);

		}


		DB::table('category')->insert([

		
			'name' => $request->name
			

		]);

		return redirect('/admin');
		
	}
}