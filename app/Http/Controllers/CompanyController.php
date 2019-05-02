<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Validator;
use Auth;

class CompanyController extends Controller {

	public function index($id, Request $request) {

			$query = DB::table('company')
			->join('category', 'category.id', '=', 'company.categoryID')
			->join('industry', 'industry.id', '=', 'company.industryID')
			->join('users', 'users.id', '=', 'company.userID')
			->where('company.id', '=', $id);
			$companies = $query->get(['company.id as id', 'company.name as name', 'company.description as description', 'company.content as content', 'company.createTime as createTime', 'industry.name as industry', 'category.name as category', 'company.logoURL as logoURL', 'users.username as username', 'users.id as userID']);

			$query = DB::table('users')
			->where('id', '=', $id);
			$users = $query->get();

			$query = DB::table('comment')
			->join('users', 'comment.userID', '=', 'users.id')
			->where('companyID', '=', $id)
			->orderBy('comment.id', 'DESC');
			$comments = $query->get(['comment.content as content', 'comment.userID as userID', 'users.username as name', 'comment.createTime as createTime']);

			$query = DB::table('rating')
			->where('companyID', '=', $id);
			$avg_rating = $query->avg('rating');

			$avg_rating = $avg_rating * 10;
			$avg_rating = number_format($avg_rating, 1, '.', '');

			$query = DB::table('rating')
			->where('companyID', '=', $id);
			$total_rating = $query->count('rating');

			if (Auth::user()) {

				$me = Auth::user()->id;
			}

			else {

				$me = 0;

			}


			return view('company.index', [

				'me' => $me,
				'companies' => $companies,
				'users' => $users,
				'comments' => $comments,
				'avg_rating' => $avg_rating,
				'total_rating' => $total_rating,
				'id' => $id

			]);
	}
			public function delete($id) {


			DB::table('rating')
            ->where([
       		'companyID' => $id
             ])
            ->delete();

            DB::table('comment')
            ->where([
       		'companyID' => $id
             ])
            ->delete();

            DB::table('company')
            ->where([
       		'id' => $id
             ])
            ->delete();

			return redirect('/admin');
		

			}


}