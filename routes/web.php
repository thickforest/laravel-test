<?php
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\View;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', function(Request $request) {
    $uri = $request->path();
    return Response(["test page", $uri], 200)->header('Content-Type', 'text/plain');
});


Route::get('/test_form', function(Request $request) {
    return view('form');
})->name('tform');

Route::post('/test_submit', function(Request $request) {
    if($request->input('username') == 'lvzhl') {
        if(!View::exists('xxxx')) {
            return "save to db";
	}
    } else {
        //return back()->withInput();
	//return redirect('/test_form')->withInput($request->except('password'));
	return redirect(route('tform'))->withInput($request->except('password'))->with("error_msg","error message");
    }
});


Route::get('post/create', 'PostController@create');
Route::post('post', 'PostController@store');
