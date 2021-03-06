<?php

use Illuminate\Support\Facades\Redirect;

class UserController extends \BaseController {

	protected $user;
	public function __construct(User $user){
		$this->user = $user;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function enter()
	{
		$validation = User::validlogin(Input::all());
		$username = Input::get('username');

		//check form rules
		if($validation->passes()){
			//check database values
			if(Auth::attempt(array('username' => $username,
				'password' => Input::get('password'),
				'verified'=> 1
			))){

				//set session values
				Session::put('user', $username);

				//get database values for notes
				//if record exist
				$this->user = User::where('username','=',$username)->first();
				$results = DB::select('select * from matches where username = ?', array($username));
				$numOfResults = count($results);
				$crushes = null;
				$percentages = null;
				for($i = 0; $i < $numOfResults; $i++){
					$crushes[$i] = $results[$i]->crushimg;
					if(($results[$i]->no + $results[$i]->yes)>0) {
						$percentages[$i] = round(($results[$i]->yes / ($results[$i]->no + $results[$i]->yes))*100);
					}
					else{
						$percentages[$i] = 0;
					}
				}


				return View::make('basic.member',['user'=>$this->user,'crushes'=>$crushes,'percentages'=>$percentages]);
//				return View::make('basic.member',['user'=>$this->user]);

				//Auth denied
			}else{

				return Redirect::back()->withInput();
			}
			//input did not match rules
		}else{
			return Redirect::back()->withInput()->withErrors($validation->messages());
		}
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//true if not a robot
		//$capt = $_POST['g-recaptcha-response'];

		//checks if it meets all rules
		$validation = User::Validate(Input::all());

		if($validation->passes()){

			//add to db
			$u = new User();
			$u->username = Input::get('username');
			$u->email = Input::get('emailaddress');
			$u->password = Hash::make(Input::get('password'));
			$u->verified = true;
			$u->save();

			//send email
//				Mail::send('emails.welcome', array('email' => Input::get('emailaddress')), function($message) {
//					$message->to( Input::get('emailaddress'))->subject('Confirmation email');
//				});
			//set session values
			$username = $u->username;
			Session::put('user', $username);

			//get database values for notes
			//if record exist
			$this->user = User::where('username','=',$username)->first();

			$results = DB::select('select * from matches where username = ?', array($username));
			$numOfResults = count($results);
			$crushes = null;
			$percentages = null;
			for($i = 0; $i < $numOfResults; $i++){
				$crushes[$i] = $results[$i]->crushimg;
				if(($results[$i]->no + $results[$i]->yes)>0) {
					$percentages[$i] = round(($results[$i]->yes / ($results[$i]->no + $results[$i]->yes))*100);
				}
				else{
					$percentages[$i] = 0;
				}
			}


			return View::make('basic.member',['user'=>$this->user,'crushes'=>$crushes,'percentages'=>$percentages]);
//				return View::make('basic.member',['user'=>$this->user]);
			//return View::make('basic.login');

		}else{
			return Redirect::back()->withInput()->withErrors($validation->messages());
		}
	}

	public function newpass()
	{
		$email = Input::get('emailaddress');
		//check for email id db
		$matches=DB::table('users') ->where('emailaddress',$email)->get();

		if($matches){

			$string = str_random(8);
			//change password in db
			DB::table('users')->where('emailaddress',$email)->update(array('password'=>Hash::make($string)));

			//email new password
			Mail::send('emails.newpass', array('pass' => $string) , function($message) {
				$message->to( Input::get('emailaddress'))->subject('New Password');
			});

			return "Your new Password has been emailed.  <a href=noteAssignment/public/user>here</a>";
		}else{
			return "No matching email found.  <a href=/forgotpass>try again</a>  <a href=noteAssignment/public/user>here</a>";
		}
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @return Response
	 */
	public function updatePics()
	{
		$username = Input::get('username');
		//return "$username";


		$user = User::where('username','=',$username)->first();

		if(!null == (Input::file('crushpic'))){
			$extension = Input::file('crushpic')->getClientOriginalName();

			//check for jpeg or gif
			if(preg_match('/(.jpe?g)|(.png)|(.gif)$/i', $extension)){
				$file = Input::file('crushpic');
				$img = file_get_contents($file);
				$data = base64_encode($img);

				$results = DB::select('select * from matches where username = ?', array($username));
				$numOfResults = count($results);

				if($numOfResults < 3) {
					DB::insert('insert into matches (username, crushimg, yes, no) values (?, ?, ?,?)', array($username, $data, 0,0));
				}
			}
		}
		if(!null == (Input::file('memberpic'))){
			$extension = Input::file('memberpic')->getClientOriginalName();

			//check for jpeg or gif
			if(preg_match('/(.jpe?g)|(.png)|(.gif)$/i', $extension)){
				$file = Input::file('memberpic');
				$img = file_get_contents($file);
				$data = base64_encode($img);
				$user->img = $data;
				$user->save();
			}
		}

		$results = DB::select('select * from matches where username = ?', array($username));
		$numOfResults = count($results);
		$testVar = Match::where('username','=',$username)->get();
		for($i = 0; $i < $numOfResults; $i++){

			if(Input::get('delete'.$i) === 'yes') {

				$testVar[$i]->delete();
				//echo "been found my testVar $testVar[0]->username";
				//DB::delete('delete from matches where crushimg = ?', array($i));
			}
		}

		$results = DB::select('select * from matches where username = ?', array($username));
		$numOfResults = count($results);
		$crushes = null;
		$percentages = null;
		for($i = 0; $i < $numOfResults; $i++){
			$crushes[$i] = $results[$i]->crushimg;
			if(($results[$i]->no + $results[$i]->yes)>0) {
				$percentages[$i] = round(($results[$i]->yes / ($results[$i]->no + $results[$i]->yes))*100);
			}
			else{
				$percentages[$i] = 0;
			}
		}


		return View::make('basic.member',['user'=>$user,'crushes'=>$crushes,'percentages'=>$percentages]);
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}
