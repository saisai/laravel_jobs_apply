<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
/*
Route::get('/', function () {
    return view('welcome');
});
*/

use Illuminate\Support\Facades\Auth;

Route::get('/', 'JobsDbController@index');
// JobsThai
Route::get('jobs-thai', 'JobsThaiController@index');
Route::get('jobs-db', 'JobsDbController@index');
// JobBkk
Route::get('jobs-bkk', 'JobsBkkController@index');

// Jobthaiweb
Route::get('jobs-thaiweb', 'JobThaiWebController@index');

// Jobthaiweb
Route::get('jobs-thaijobcom', 'ThaijobComController@index');

// monster.co.th
Route::get('jobs-monstercoth', 'MonsterCoThController@index');



// JobYes
Route::get('jobs-jobyescoth', 'JobYesController@index');

// JobTopGun
Route::get('jobs-topgun', 'JobsTopGunController@index');

// JobDbSg
Route::get('jobs-db-sg', 'JobsDbSgController@index');

// JobsCentralSg
Route::get('jobs-central-sg', 'JobsCentralSgController@index');

// JobsMonsterSg
Route::get('jobs-monster-sg', 'JobsMonsterSgController@index');
// JobsStSg
Route::get('jobs-st-sg', 'JobsStSgController@index');

// JobsStSg
Route::get('jobs-gumtree-sg', 'JobsGumtreeSgController@index');

Route::get('web-jobs-bangkok', 'WebjobsBangkokController@index');
Route::get('sg-jobs-on-line', 'SgJobsOnLineController@index');
Route::get('raywnderlichcom', 'RaywenderlichcomController@index');


// JobsIndeedSg
Route::get('jobs-indeed-sg', 'JobsIndeedSgController@index');
Route::get('jobs-rapido-sg', 'JobsSgjobrapidoController@index');
Route::get('jobs-careerjet-sg', 'JobsCareerJetSgController@index');
Route::get('toptal-dot-com', 'ToptaldotcomController@index');

$router->group(['middleware' => 'auth'], function() {
	
Route::get('logout', function () {
    

    Auth::logout();
    return redirect('jobs-db');
    
});    

Route::post('add_job_db', 'JobsDbController@create');

Route::match(['get', 'post'], 'list', 'ListingController@index');
Route::post('delete-list', 'ListingController@destroy');

Route::get('upload-file', 'UploadFileController@index');
Route::post('upload-data', 'UploadFileController@store');
Route::get('list-file', 'UploadFileController@show');
Route::get('edit-upload/{id}', 'UploadFileController@edit');
Route::get('delete-upload/{id}', 'UploadFileController@destroy');
Route::post('reupload-image', 'UploadFileController@update');

Route::get('apply-for', 'ApplyForController@index');
Route::post('add-apply-for', 'ApplyForController@create');
Route::get('list-apply-for', 'ApplyForController@show');
Route::get('edit-apply-for/{id}', 'ApplyForController@edit');
Route::get('delete-apply-for/{id}', 'ApplyForController@destroy');
Route::post('save-edit-apply-for', 'ApplyForController@update');

Route::post('show-form-detail', 'DetailController@index');
Route::post('add-detail', 'DetailController@create');
Route::post('detail-list', 'DetailController@show');
Route::post('send-mail', 'DetailController@sendmail');
Route::post('show-edit-detail', 'DetailController@edit');
Route::post('edit-detail', 'DetailController@update');

//Route::get('auth/logout', 'Auth\AuthController@logout');
Route::get('category', 'CategoryController@index');
Route::post('add-category', 'CategoryController@create');
Route::get('list-category', array('as'=>'list-category', 'uses'=>'CategoryController@listCategory'));
Route::get('view-category/{id}', array('as'=>'view-category', 'uses'=>'CategoryController@viewCategory'));
Route::get('edit-go-category/{id}', array('as'=>'edit-go-category', 'uses'=>'CategoryController@goeditCategory'));
Route::post('save-edit-category', array('as'=>'save-edit-category', 'uses'=>'CategoryController@saveEditCategory'));
Route::get('delete-category/{id}', array('as'=>'delete-category', 'uses'=>'CategoryController@deleteCategory'));

// post
Route::get('post', array('as'=>'post', 'uses'=>'PostController@index'));
Route::post('add-post', array('as'=>'add-post', 'uses'=>'PostController@addPost'));
Route::get('list-post', array('as'=>'list-post', 'uses'=>'PostController@listPost'));
Route::get('view-post/{id}', array('as'=>'view-post', 'uses'=>'PostController@viewPost'));
Route::get('edit-go-post/{id}', array('as'=>'edit-go-site', 'uses'=>'PostController@goeditPost'));
Route::post('save-edit-post', array('as'=>'save-edit-post', 'uses'=>'PostController@saveEditPost'));
Route::get('delete-post/{id}', array('as'=>'delete-post', 'uses'=>'PostController@deletePost'));

// Todo List
Route::get('todo', array('as'=>'todo', 'uses'=>'TodoController@index'));
Route::post('add-todolist', array('as'=>'add-todolist', 'uses'=>'TodoController@addTodolist'));
Route::get('list-todolist', array('as'=>'list-todolist', 'uses'=>'TodoController@listTodo'));
Route::get('view-todo/{id}', array('as'=>'view-todo', 'uses'=>'TodoController@viewTodo'));
Route::get('edit-go-todo/{id}', array('as'=>'edit-go-todo', 'uses'=>'TodoController@goeditTodo'));
Route::post('save-edit-todo', array('as'=>'save-edit-todo', 'uses'=>'TodoController@saveEditTodo'));
Route::get('delete-todo/{id}', array('as'=>'delete-todo', 'uses'=>'TodoController@deleteTodo'));

});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
