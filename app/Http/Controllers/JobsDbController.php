<?php namespace App\Http\Controllers;

use App\Models\JobsDb;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Input;
use App\Models\Apply;
use Illuminate\Support\Facades\Redirect;
use DB;

class JobsDbController extends Controller {




	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
		$result = JobsDb::paginate(100);
				
		return view('jobsdb', compact('result'))->with('title', 'Jobs-db');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//

        $form_data = array();

        $title = Input::get('title');
        $getLink = trim(e(Input::get('link')));
        $link = str_replace("&amp;", "&", $getLink);
        $from_which_website = (Input::get('from_which_website') == "/") ? "jobs-db" : Input::get('from_which_website');

        $apply = new Apply();
        $apply->title = $title;
        $apply->link = $link;
        $apply->from_which_website = $from_which_website;
        $apply->created_at = date("Y-m-d H:i:s");
        $apply->apply = 0;
        $apply->detail = 0;
        $apply->apply_times = 0;
        $apply->tb_detail_id = 0;
        $apply->users_id = auth()->user()->id;

        //$result = DB::select( DB::raw("SELECT count(*) as countID  FROM `tb_apply` WHERE `link` = :link and `users_id` = :user_id",
        $result = DB::select("SELECT count(*) as countID  FROM `tb_apply` WHERE `link` = :link and `users_id` = :user_id",
			array(
			"link" => $link,
			"user_id" => auth()->user()->id
			)
		);
        if($result[0]->countID > 0):
            $form_data['success'] = false;
        else:
            $apply->save();
            $form_data['success'] = true;

        endif;


        echo json_encode($form_data);
        /*
        if($apply->save()):
            return redirect($from_which_website)->with('success', 'Successfully added!');
        endif;
        */

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
