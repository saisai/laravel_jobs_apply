<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\View\View;
use Input;
use App\Models\Detail;
use Illuminate\Support\Facades\Redirect;
use App\Models\Apply;
use Mail;
use DB;
use App\Models\Upload;
use App\Models\ApplyFor;
use App\Models\Applytimes;

use Validator;

class DetailController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
        //$getFiles = Upload::all();
        $applyFor = ApplyFor::where('users_id', '=', auth()->user()->id)->get();
		//echo Input::get('tb_apply_id');
		//exit;
        return view('detail.index')
            ->with('link', Input::get('link'))
            ->with('tb_apply_id', Input::get('tb_apply_id'))
            ->with('title', 'Adding details')            
            ->with('applyFor', $applyFor);
			//->with('getFiles', $getFiles)

	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create(Request $request)
	{
		
    	$validator = Validator::make($request->all(), [
            'email' => 'required',            
            'applyFor' => 'required'   
            
        ]);
		
        if ($validator->passes()) {

			$email = Input::get('email');
			$link = Input::get('link');
			$qualification = Input::get('qualification');
			$responsibility = Input::get('responsibility');
			$companyinfo = Input::get('companyinfo');
			$salary = Input::get('salary');
			//$cv_file_name = Input::get('cvFile');
			$apply_for = Input::get('applyFor');

			$detail = new Detail();
			$detail->email = $email;
			//$detail->link = $link;
			$detail->qualification = $qualification;
			$detail->responsibility = $responsibility;
			$detail->companyInfo = $companyinfo;
			$detail->salary = $salary;
			$detail->tb_apply_id = Input::get('tb_apply_id');
			//$detail->cv_file_name = $cv_file_name;
			$detail->apply_for_id = $apply_for;
			//$detail->users_id = auth()->user()->id;
			$detail->save();

			$apply = new Apply();
			$apply_result = Apply::where(
				array(
					'link' => $link,
					'users_id' => auth()->user()->id
				))
			->update(array('tb_detail_id' => $detail->id));


			return response()->json(['msg'=> true]);
        }


    	return response()->json(['msg'=>$validator->errors()->all()]);

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
        $getId = Input::get('id');
        $result = DB::select( DB::raw("SELECT D.email email, 
		D.qualification qualification, D.responsibility responsibility, 
		D.companyInfo companyInfo, D.salary salary, A.title title
		FROM tb_detail AS D LEFT JOIN tb_apply_for AS A ON D.apply_for_id = A.id  
		WHERE D.id = :getId "),
		array(
			'getId' => $getId,			
		)
		);
        //dd(DB::getQueryLog());
        foreach($result as $data):
            $email = $data->email;
            //$link = $data->link;
            $qualification = $data->qualification;
            $responsibility = $data->responsibility;
            $companyInfo = $data->companyInfo;
            $salary = $data->salary;
            //$cv_file_name = $data->filename;
            $title = $data->title;
        endforeach;



        return view('detail.showdetail')
            ->with('title', 'Editing')
            ->with('email', $email )
            //->with('link', $link)
            ->with('qualification', $qualification )
            ->with('responsibility', $responsibility )
            ->with('companyInfo', $companyInfo )
            ->with('salary', $salary )
            //->with('cv_file_name', $cv_file_name)
            ->with('titles', $title);

 

	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit()
	{

        // get all files

        //$getFiles = Upload::all();
        $applyFor = ApplyFor::where(
				array(
					'users_id' => auth()->user()->id
				)
				
			)->get();

        $id = Input::get('id');
        $data = DB::select( DB::raw("SELECT
                APPLY.id as apply_id,
                DETAIL.id as detail_id,
                DETAIL.email,
                DETAIL.qualification,
                DETAIL.responsibility,
                DETAIL.companyInfo,
                DETAIL.salary,                
                DETAIL.apply_for_id
                FROM tb_apply APPLY
                LEFT JOIN tb_detail DETAIL ON APPLY.tb_detail_id = DETAIL.id
                WHERE APPLY.id= :id" ),
				array(
				'id' => $id							
				)
				);

        return view('detail.showedit')
            ->with('data', $data)
            ->with('applyFor', $applyFor)
           // ->with('getFiles', $getFiles)
            ->with('title', 'Editing');
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update()
	{
		//
        $date = new \DateTime;
        $post = Input::all();
        $detail_id = $post['deail_id'];
        $email = $post['email'];
        $qualification = $post['qualification'];
        $responsibility = $post['responsibility'];
        $companyinfo = $post['companyinfo'];
        $salary = $post['salary'];
        $apply_for_id = $post['apply_for_id'];
        //$cv_file_name= $post['cvFile'];

        Detail::where(
			array( 
			'id' => $detail_id			
			)
			)
            ->update(
                array(
                    'email' => $email,
                    'qualification' => $qualification,
                    'responsibility' => $responsibility,
                    'companyInfo' => $companyinfo,
                    'salary' => $salary,
                    //'cv_file_name' => $cv_file_name,
                    'apply_for_id' => $apply_for_id,
                    'updated_at' =>$date->format('Y-m-d H:i:s')
                )
            );

        return redirect('list');
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


    public function sendmail()
    {
        $post = Input::all();

        $tbApplyId = $post['tb_apply_id'];
        $result = Detail::where(
			array(
			'id' => $post['detail_id'],			
			))->get();
        $email = $result[0]->email;



        $data = DB::table('tb_detail')
            ->leftJoin('tb_upload', function( $funJoin)
            {
                $funJoin->on('tb_detail.apply_for_id', '=', 'tb_upload.apply_for_id'); // change tb_upload.title to tb_upload.apply_for_id

            })
            ->where('tb_detail.id','=',  $post['detail_id'])
            ->first();
		//var_dump($data->apply_for_id);
		
		// get all files to be sent
		
		$uploadedFiles = DB::table('tb_upload')->where('apply_for_id', '=', $data->apply_for_id)->get();
		//var_dump($uploadedFiles);
		
		$file_to_be_sent_path = public_path() .'/assets/files/';
		
		$getFiles = array();
		foreach($uploadedFiles as $key=>$val)
		{
			//echo $val->filename;
			//array_pop(explode('/', $string));
			//$getFiles[] = $file_to_be_sent_path.$val->filename;
			//$filename = $file_to_be_sent_path.$val->filename;
			//$getFiles[] = array_pop(explode('/', $filename));
			$newfileanme = preg_replace("/[0-9-]/","",$val->filename);
			copy($file_to_be_sent_path.$val->filename, $file_to_be_sent_path.$newfileanme);
			$getFiles[] = $file_to_be_sent_path.$newfileanme;
			//echo $files['filename'];
		}
		//var_dump($getFiles);
				
        //dd(DB::getQueryLog()); // to see mysql
		
		
        // Get Position Title
        $applyFor = DB::table('tb_apply_for')
            ->where('id', $data->apply_for_id)->first();

				
		$user = array(
			'email'=>$data->email,
			'apply_for'=>$applyFor->title
			//'name'=>'Sai Sai'
		);
		
		$data = array(
            'detail'=>'Detail Sending'
            //'name'	=> $user['name']
        );
		$dd = explode(',', $user['email']);
				$html = "";
				$count = sizeof($dd);
				if( $count > 1):
					for($i = 0; $i < $count; $i++):
							$email = trim($dd[$i]);
							Mail::send('emails.welcome', $data, function($message) use ($user,$email, $getFiles)
							{
								$message->from('hello@gmail.com', 'Nyein Pe');
								$message->to($email)->subject('Apply for '. $user['apply_for']);
								//$message->attach($file_to_be_sent);
								
								foreach($getFiles as $val)
								{
									$message->attach($val);
								}
								//$message->to($user['email'], $user['name'])->subject('Welcome to My Laravel app!');
							});
					endfor;
				else:
					$email = trim($dd[0]);			
					Mail::send('emails.welcome', $data, function($message) use ($user,$email, $getFiles)
					{
						$message->from('hello@gmail.com', 'Nyein Pe');
						$message->to($email)->subject('Apply for '. $user['apply_for']);
						//$message->attach($file_to_be_sent);
						foreach($getFiles as $val)
						{
							$message->attach($val);
						}						
						//$message->to($user['email'], $user['name'])->subject('Welcome to My Laravel app!');
					});			
					
				endif;						
				
				
        $applytimes = new Applytimes;
        $applytimes->id = $tbApplyId;
        $applytimes->users_id = auth()->user()->id;
        $applytimes->created_at = date('Y-m-d H:i:s');
        $applytimes->save();


        // Get Count and add to tb_appl
        $getCount = DB::table('tb_applied_times')
            ->select(DB::raw('count(*) as count'))
            ->where('id', '=', $tbApplyId)
            ->first();

        DB::table('tb_apply')
            ->where('id',$tbApplyId)
            ->update(array('apply_times'=> $getCount->count));
		
		// delete files being copied
				
		foreach($getFiles as $deletedfile)
		{
			unlink($deletedfile);
		}		
		
        $result = array();
        $result['success'] = true;
        echo json_encode($result);
		
		
        //return redirect('list')->with('success', 'Successfully send!');
				

    }

}
