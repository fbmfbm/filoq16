<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class ThemaController extends Controller
{

	public function index()
	{



	}


	public function offre_logmt($convent)
	{


		return view('sections/offre_logment')->with('convent',$convent);
	}	

	public function construct_logmt($convent)
	{


		return view('sections/construct_logment')->with('convent',$convent);
	}

}
