<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Thaijobcom;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Input;
use App\Models\Apply;
use Illuminate\Support\Facades\Redirect;
use DB;


class ThaijobComController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
		$result = Thaijobcom::paginate(100);
		
		return view('thaijobcom', compact('result'))->with('title', 'Thaijobcom');
	}
}
