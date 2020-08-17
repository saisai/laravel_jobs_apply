<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use DB;
use App\Helper\Helpers;
use App\Models\Post;
use Input;

class PostController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
	$data = DB::select( DB::raw("SELECT tt.term_id id, t.name name, tt.parent parent FROM terms AS t LEFT JOIN term_taxonomy AS tt ON t.term_id = tt.term_id order by tt.parent desc") );
		
		// changed stdClass array to array
		$array = json_decode(json_encode($data), true);	
  	$result = Helpers::Category_combo($array,0,0);
			
		 return view('posts.index')
                    ->with('title', 'Posts')
                    ->with('data', $result);		
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
	
	public function addPost()
	{
			$post = new Post;
			
			//Get skip number of posts
			$id = Helpers::getSkipNumber('posts', 'id');
			if($id):
				$post->id = $id;
				$post->post_title = Input::get('title');
				$post->post_content = Input::get('description');
				$post->post_parent = Input::get('category');
				$post->created_at = date("Y-m-d H:i:s");			
				$post->save();
			else:
				$post->post_title = Input::get('title');
				$post->post_content = Input::get('description');
				$post->post_parent = Input::get('category');
				$post->created_at = date("Y-m-d H:i:s");			
				$post->save();			
			endif;
			
			return redirect('post')
						->with('success', 'Successfully added!');
			
	}
	
	public function listPost()
	{
		//$data = DB::select( DB::raw("SELECT tt.term_id id, t.name name, tt.parent parent FROM terms AS t LEFT JOIN term_taxonomy AS tt ON t.term_id = tt.term_id order by tt.parent desc") );
		$data = DB::select( DB::raw("SELECT T.name name, P.* FROM posts as P INNER JOIN terms as T WHERE P.post_parent=T.term_id") );
		return view('posts.list')
					->with('title', 'List Posts')
					->with('data', $data);
		/*
		$data = Site::paginate(20);		
		return View::make('sites.list')
						->with('title', 'List Sites')
						->with('data', $data);
		*/
	}
	
	public function viewPost($id)
	{
		$data = Post::find($id);
		
		return view('posts.detail')
						->with('title', $data->post_title)
						->with('data', $data);
	}
	
	public function goeditPost($id)
	{
		
		$data = DB::select( DB::raw("SELECT tt.term_id id, t.name name, tt.parent parent FROM terms AS t LEFT JOIN term_taxonomy AS tt ON t.term_id = tt.term_id order by tt.parent desc") );
		
		// changed stdClass array to array
		$array = json_decode(json_encode($data), true);	
  	
		
		$result = Post::find($id);
		
		$selectedid = $result->post_parent ;
		$results = Helpers::Category_combo_selected($array,0,0,0, $selectedid);
		return view('posts.edit')
						->with('title', 'Edit post')
						->with('result', $result)
						->with('data', $results);
	}
	
	public function saveEditPost()
	{
			Post::where('id', '=', Input::get('id'))
					->update(array(
					'post_title'=>Input::get('title'),
					'post_content'=>Input::get('description'),
					'post_parent' => Input::get('category'),
					'updated_at'=>date('Y-m-d H:i:s')
					));
					
		return redirect('list-post')
						->with('success', 'Successfully edited!');							
				
	}
	
	public function deletePost($id)
	{
		$result = Post::find($id);
		$result->delete();
		return redirect('list-post')
					->with('success', 'Successfully deleted');
	}

}
