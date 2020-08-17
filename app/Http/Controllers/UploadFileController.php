<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Upload;
use App\Models\ApplyFor;

use Illuminate\Http\Request;
use Input;
use Illuminate\Support\Facades\Redirect;
use Validator;
use File;

class UploadFileController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
		$applyFor = ApplyFor::where('users_id', '=', auth()->user()->id)->get();
		
        return view('upload.index')
			->with('applyFor', $applyFor)
            ->with("title", "Upload File");
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{

	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		//$fileinput = $request->input('fileinput');
		
    	$validator = Validator::make($request->all(), [
            //'title' => 'required',
            'applyFor' => 'required',
            'fileinput' => 'required|mimes:pdf,doc,docx,DOCX'
            //'fileinput' => 'required|image|mimes:pdf,doc,docx|max:2048'
            //'fileinput' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
            
        ]);


        if ($validator->passes()) {
		  //$imageName = time().'.'.request()->fileinput->getClientOriginalExtension();	
		  $imageName = "resume-".time().'.'.request()->fileinput->getClientOriginalExtension();	
		  $image = $request->file('fileinput');
		  //$new_name = rand() . '.' . $image->getClientOriginalExtension();
		  $destinationPath = public_path().'/assets/files';
		  $upload_success = $image->move($destinationPath, $imageName);
			if($upload_success):
				//$date = new \DateTime();
				
				$upload = new Upload();

				$upload->apply_for_id  = Input::get('applyFor');
				$upload->filename = $imageName;
				$upload->created_at = date("Y-m-d H:i:s");
				$upload->users_id = auth()->user()->id;
				$upload->save();
				//return redirect('upload-file')->with('success', 'File was uploaded succesfully.');
				//$errors = array('msg' => true);
				//return Response()->json($errors);
			endif;

			return response()->json(['msg'=> true]);
        }


    	return response()->json(['msg'=>$validator->errors()->all()]);
		
		/*
		$fileinput = Input::get('fileinput');
		$title = Input::get('title');

		if(empty($title))
		{
			$errors = array('msg' => "Title can not be blank");
			return Response()->json($errors);
		}

		if(request()->validate([

				'fileinput' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

			]))
		{
			
		}
		else {
			var_dump($validation->errors()->all());
			$errors = array('msg' => request()->errors()->all());
			return Response()->json($errors);			
		}
		*/
		/*
        $imageName = time().'.'.request()->fileinput->getClientOriginalExtension();	

		if ($request->file('fileinput'))
		 {
		  $image = $request->file('fileinput');
		  //$new_name = rand() . '.' . $image->getClientOriginalExtension();
		  $destinationPath = public_path().'/assets/files';
		  $upload_success = $image->move($destinationPath, $imageName);
			if($upload_success):
				//$date = new \DateTime();
				
				$upload = new Upload();

				$upload->title = $title;
				$upload->filename = $imageName;
				$upload->created_at = date("Y-m-d H:i:s");
				$upload->save();
				//return redirect('upload-file')->with('success', 'File was uploaded succesfully.');
				$errors = array('msg' => true);
				return Response()->json($errors);
			endif;
			   
		 }
		 else
		 {
			 $errors = array('msg' => "Error can not be blank");
				return Response()->json($errors);
			 
		 }		 

		*/

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
        $data = Upload::paginate(100)->where('users_id', '=', auth()->user()->id);
		if(count($data) > 0)
		{
        return view('upload.list')
            ->with('data', $data)
            ->with('title', 'Listing Files');
		}
		else
		{
			return redirect('upload-file');
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
		//
        return $id;
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update()
	{
        $id = Input::get('id');
        //$upload = DB::table('tb_upload')->where('id', $id)->first();
        //$upload = Upload::find($id);
        //$filename = $upload->filename;
        $destinationPath = public_path().'/assets/files';
        $file = Input::file('file');
        $filename = Input::file('file')->getClientOriginalName();
        $upload_success = Input::file('file')->move($destinationPath, $filename);

        if( $upload_success ):
            Upload::where('id', '=', $id)->update(array('filename' => $filename,'updated_at' => date("Y-m-d H:i:s")));
            return redirect('list-file');
            //return redirect('edit-upload', array($id));
        endif;
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
        //$upload = DB::table('tb_upload')->where('id', $id)->first();
        $upload = Upload::find($id);
        $file = $upload->filename;
        //return public_path().'/assets/files/'.$file;
		$upload->delete();
        File::delete(public_path().'/assets/files/'.$file);
		
		return redirect('list-file');
		/*
        return view('upload.reuploadimage')
            ->with('title', 'Reupload Image')
            ->with('data', $upload);
		*/
	}

}
