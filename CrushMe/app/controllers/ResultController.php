<?php

class ResultController extends BaseController
{


	public function yes(){
		//calculate stuff for yes vote here, display a yes gif
		return View::make('basic.gif');
	}

	public function no(){
		//calculate stuff for no vote here, display ano gif
		return View::make('basic.gif');
	}


}