<?php

class UserController extends \BaseController {

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
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//true if not a robot
		$capt = $_POST['g-recaptcha-response'];

		//checks if it meets all rules
		$validation = User::Validate(Input::all());

		if($validation->passes()){
			if($capt){
				//add to db
				$u = new User();
				$u->username = Input::get('username');
				$u->email = Input::get('emailaddress');
				$u->password = Hash::make(Input::get('password'));
				$u->status = false;
				$u->save();

				//send email
				Mail::send('emails.welcome', array('email' => Input::get('emailaddress')), function($message) {
					$message->to( Input::get('emailaddress'))->subject('Confirmation email');
				});
				return "Added! Check your email for confirmation, then <a href=/noteAssignment/public/user>Log in</a>";

			}else{
				return ('Robots not Allowed!');
			}
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
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
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
