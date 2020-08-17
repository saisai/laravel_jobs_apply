<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\MonsterCoTh;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Input;
use App\Models\Apply;
use Illuminate\Support\Facades\Redirect;
use DB;


class MonsterCoThController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
		$result = MonsterCoTh::paginate(100);
		
		return view('monstercoth', compact('result'))->with('title', 'MonsterCoTh');
	}
}
