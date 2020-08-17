<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Apply;
use App\Models\Detail;
use Input;

class ListingController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
        //
        $result = Apply::paginate(100)->where('users_id', '=', auth()->user()->id);
        		
		if(count($result) > 0)
		{
			return view('listing', compact('result'))->with('title', 'Listing');
		}
		else
		{
			return redirect('jobs-db');
		}

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
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show()
	{
		//
        return Input::get('id');
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
	public function destroy()
	{
        $apply = Apply::find(Input::get('id'))->get();

		if(sizeof($apply) > 0)
		{

			echo sizeof(Detail::where('tb_apply_id', '=', Input::get('id'))->get());
			
			if(sizeof(Detail::where('tb_apply_id', '=', Input::get('id'))->get()) > 0)
			{
				Detail::where('tb_apply_id', '=', Input::get('id'))->delete();				
			}
			
			$delete_apply = Apply::find(Input::get('id'));
			$delete_apply->delete();
		}
		
		return redirect('list')->with('success', 'Successfully deleted!');
	}

}
