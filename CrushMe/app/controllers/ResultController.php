<?php

class ResultController extends BaseController
{

	public function edit(){
		return "finally!";
	}

	public function yes(){
		return View::make('basic.gif');
	}


}