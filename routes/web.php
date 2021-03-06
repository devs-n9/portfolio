<?php

use App\Models\Category;
use App\Models\Project;
use Auth;
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

Route::group(['middleware' => ['admin']], function () {
    Route::get('/dashboard', 'Backend\DashboardController@index');

	Route::resource('/dashboard/projects', 'Backend\ProjectsController');

	Route::get('/dashboard/logout', function () {
		Auth::logout();
	});
});

Route::get('/', "Frontend\DefaultController@index");
Route::get('/category/{category}', 'Frontend\DefaultController@category');
Auth::routes();

Route::post('/email', 'Frontend\DefaultController@email');

Route::get('/test', function () {
	$projects = Project::all();
	$categories = Category::all();
	$projectscat = Category::getCountProjectsByCategory();
	return view('test', [
		'projects' => $projects,
		'categories' => $categories,
		'projectscat' => $projectscat
	]);
});