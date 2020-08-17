<?php

namespace App\Http\Controllers;

use App\Models\Jobthaiwebcom;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Input;
use App\Models\Apply;
use Illuminate\Support\Facades\Redirect;
use DB;

use Illuminate\Http\Request;

class JobThaiWebController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
		$result = Jobthaiwebcom::paginate(100);
		
		return view('jobthaiweb', compact('result'))->with('title', 'Job thai web');
	}
}
