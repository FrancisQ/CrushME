<?php

use Illuminate\Support\Facades\DB;

/**
 * @property  user
 */
class ResultController extends BaseController
{


	public function newmatch(){

		//find out how many members there are
		$results = DB::select('select * from users');
		$numOfResults = count($results);

		//randomly pic one and save it
		$random = rand(1, $numOfResults);

		$this->user = User::where('id','=',$random)->first();
		$username = $this->user->username;

		//find its crushes
		//$results = DB::select('select * from matches where username ='.$username);
		$results = DB::table('matches')->where('username', '=', $username )->get();

		$val = count($results);
		$random2 = rand(0, $val-1);

		$crush = $results[$random2];


		return View::make('basic.home',['user'      =>$this->user,
										'crush'     =>$crush
		]);

	}

	public function yes(){
		//calculate stuff for yes vote here, display a yes gif

		$id = Input::get('id');

		DB::table('matches')->where('id','=',$id)->increment('yes');

		return View::make('basic.gif');
	}

	public function no(){
		//calculate stuff for no vote here, display ano gif

		$id = Input::get('id');

		DB::table('matches')->where('id','=',$id)->increment('yes');

		return View::make('basic.gif');
	}


}