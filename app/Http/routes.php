<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
use \Illuminate\Http\Request;
use App\Models\Task;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/tasks', function () {
	$tasks = Task::all();
    return view('tasks.index', [
		'tasks' => $tasks,
    ]);
})->name('tasks.index');

Route::post('/tasks', function (Request $request) {
	$validator = Validator::make($request->all(), [
		'name' => 'required|max:5'//TODO 255
	]);
	if($validator->fails()){
		return redirect(route('tasks.index'))
			->withInput()
			->withErrors($validator);
	}
    $task = new Task();
	$task->name = $request->name;
	$task->save();
	return redirect(route('tasks.index'));
})->name('tasks.store');

Route::delete('/tasks/{task}', function (Task $task){
	$task->delete();
	return redirect(route('tasks.index'));
})->name('tasks.destroy');