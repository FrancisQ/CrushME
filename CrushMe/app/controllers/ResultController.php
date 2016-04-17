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
		$resultsNo = 0;
		while($resultsNo == 0) {

			//randomly pic one and save it
			$random = rand(0, $numOfResults-1);
			$randUser = DB::table('users')->get();
			$this->user = $randUser[$random];//User::where('id', '=', $random)->first();
			$username = $this->user->username;

			//find its crushes
			//$results = DB::select('select * from matches where username ='.$username);
			$results = DB::table('matches')->where('username', '=', $username)->get();
			$resultsNo = count($results);
		}
		$val = count($results);
		$crush = null;
		if($val > 0) {
			$random2 = rand(0, $val - 1);
			$crush = $results[$random2];
		}

		return View::make('basic.home',['user'      =>$this->user,
										'crush'     =>$crush
		]);

	}

	public function yes(){
		//calculate stuff for yes vote here, display a yes gif

		$id = Input::get('id');

		DB::table('matches')->where('id','=',$id)->increment('yes');
		$imglink = "yes".rand(0,6).".gif";
		return View::make('basic.gif', ['imgsrc'=>$imglink]);
	}

	public function no(){
		//calculate stuff for no vote here, display ano gif

		$id = Input::get('id');

		DB::table('matches')->where('id','=',$id)->increment('no');
		$imglink = "no".rand(0,6).".gif";
		return View::make('basic.gif', ['imgsrc'=>$imglink]);
	}


}