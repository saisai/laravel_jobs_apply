<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Terms;
use App\Models\Termtaxonomy;
use Input;
use DB;
use App\Helper\Helpers;
class CategoryController extends Controller {

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
			
		 return view('category.index')
                    ->with('title', 'Category')
                    ->with('data', $result);		
		
		//return view('category.index')
            //->with('title', 'Add category');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
			$term = new Terms;
			$term->name = Input::get('title');
			//$category->description = Input::get('description');
			//$category->created_at = date("Y-m-d H:i:s");
			$term->save();
			
			if(Input::get('category') && Input::get('category') > 0 ):
				$termtaxonomy = new Termtaxonomy;
				$termtaxonomy->term_id = $term->id;			
				$termtaxonomy->parent = Input::get('category');			
				$termtaxonomy->save();
			else:
				$termtaxonomy = new Termtaxonomy;
				$termtaxonomy->term_id = $term->id;			
				$termtaxonomy->parent = 0;			
				$termtaxonomy->save();			
			endif;
			return redirect('category')->with('success', 'Successfully added!');

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
	
	public function listCategory()
	{
		$data = DB::select( DB::raw("SELECT tt.term_id id, t.name name, tt.parent parent FROM terms AS t LEFT JOIN term_taxonomy AS tt ON t.term_id = tt.term_id order by tt.parent desc") );
		
		return view('category.list')
						->with('title', 'List Category')
						->with('data', $data);								

	}
	
	public function viewCategory($id)
	{
		$data = Terms::where('term_id', '=', $id)->get();		
		return view('category.detail')
						->with('title', 'View detail of Category List')
						->with('data', $data);
		
	}
	
	public function goeditCategory($id)
	{
		$data = Terms::where('term_id', '=', $id)->get();
		return view('category.edit')
						->with('title', 'Edit Category List')
						->with('data', $data);
	}
	
	public function saveEditCategory()
	{
			//DB::connection()->enableQueryLog();
			Terms::where('term_id', '=', Input::get('id'))
					->update(array(
					'name'=>Input::get('title'),					
					'updated_at'=>date('Y-m-d H:i:s')
					));
			//return DB::getQueryLog();
			
					
		return redirect('list-category')
						->with('success', 'Successfully edited!');							
				
	}
	
	public function deleteCategory($id)
	{
			$result = Terms::where('term_id', '=', $id);
			$result->delete();
			return redirect('list-category')
						->with('success', 'Successfully deleted!');										
	}	

}
