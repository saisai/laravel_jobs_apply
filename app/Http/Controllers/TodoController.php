<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Todolist;
use DB;
use Input;
use App\Helper\Helpers;

class TodoController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('todo.index')
                    ->with('title', 'Todo List');
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
	
public function addTodolist()
	{
			$todolist = new Todolist;
			
			// Get skip number from tb_todolist table
			$id = Helpers::getSkipNumber('tb_todolist', 'id');
			if($id):
				$todolist->id = $id;
				$todolist->title = Input::get('title');
				$todolist->description = Input::get('description');
				$todolist->created_at = date("Y-m-d H:i:s");
				$todolist->save();
			else:
				$todolist->title = Input::get('title');
				$todolist->description = Input::get('description');
				$todolist->created_at = date("Y-m-d H:i:s");
				$todolist->save();			
			endif;
			
			return redirect('todo')
						->with('success', 'Successfully added!');
			
	}
	
	public function listTodo()
	{
		$data = Todolist::paginate(20);
		
		return view('todo.list')
						->with('title', 'List TodoList')
						->with('data', $data);
	}
	
	public function viewTodo($id)
	{
		$data = Todolist::find($id);
		
		return view('todo.detail')
						->with('title', $data->title)
						->with('data', $data);
	}
	
	public function goeditTodo($id)
	{
		$data = Todolist::find($id);
		return view('todo.edit')
						->with('title', 'Edit Todo List')
						->with('data', $data);
	}
	
	public function saveEditTodo()
	{
			Todolist::where('id', '=', Input::get('id'))
					->update(array(
					'title'=>Input::get('title'),
					'description'=>Input::get('description'),
					'updated_at'=>date('Y-m-d H:i:s')
					));
					
		return redirect('list-todolist')
						->with('success', 'Successfully edited!');							
				
	}
	
	public function deleteTodo($id)
	{
			$result = Todolist::find($id);
			$result->delete();
			return redirect('list-todolist')
						->with('success', 'Successfully deleted!');										
	}	

}
