<?php

namespace App\Http\Controllers;


use App\Models\JobYes;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Input;
use App\Models\Apply;
use Illuminate\Support\Facades\Redirect;
use DB;

use Illuminate\Http\Request;

class JobYesController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
		$result = JobYes::paginate(100);
		
		return view('jobyescoth', compact('result'))->with('title', 'Jobyescoth');
	}
}
