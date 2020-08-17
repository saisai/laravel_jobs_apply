<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\ApplyFor;
use Input;
use Validator;

class ApplyForController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        return view('applyfor.index')
            ->with('title', 'Apply for');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create(Request $request)
	{
		
    	$validator = Validator::make($request->all(), [
            'title' => 'required',           
        ]);


        if ($validator->passes()) {
		 	$apply = new ApplyFor();
			$apply->title = Input::get('title');
			$apply->users_id = auth()->user()->id;

			$apply->save();
			return response()->json(['msg'=> true]);
        }


    	return response()->json(['msg'=>$validator->errors()->all()]);
		/*
		$title = Input::get('title');

		if(empty($title))
		{
			$errors = array('msg' => "Title can not be blank");
			return Response()->json($errors);
		}
		else
		{
			$post = Input::all();
			$title = $post['title'];
			$apply = new ApplyFor();
			$apply->title = $title;

			$apply->save();
			
			$errors = array('msg' => "Sucessfully added");
			return Response()->json($errors);
			/*
			return redirect('apply-for')
				->with('success', 'Sucessfully added');
			*/
		//}
		
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
        $data = ApplyFor::paginate(100)->where('users_id', '=', auth()->user()->id);
		if(count($data) > 0)
		{
        return view('applyfor.list', compact('data'))
            ->with('title', 'List Apply For');
		}
		else
		{
			return redirect('apply-for');
		}

	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        $apply = ApplyFor::find($id);
        return view('applyfor.edit')
            ->with('data', $apply)
            ->with('title', 'Edit Apply For');
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update()
	{
		$data = Input::all();
        $id = $data['id'];
        $title = $data['title'];
        ApplyFor::where('id', '=', $id)
            ->update(
                array(
				    'users_id' => auth()->user()->id,
                    'title' => $title
                )
            );

        return redirect('list-apply-for')
            ->with('success', 'Successfully Updaed!');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
        $apply = ApplyFor::find($id);
        $apply->delete();
        return redirect('list-apply-for')->with('success', 'Successfully deleted!');
	}

}
