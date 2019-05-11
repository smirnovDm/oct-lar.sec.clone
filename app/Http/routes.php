<?php

use Illuminate\Http\Request;
use App\Task;
use App\News;


Route::get('/', function(){
    return view('index');
})->name('home');

Route::group(['prefix' => 'tasks'], function() {
    Route::get('/', function () {
	$tasks = Task::all();
	return view('tasks.index', [
	    'tasks' => $tasks, //значение переменной tasks спроецируется в переменную tasks внутри view
	]); //в уроке это вид tasks
    })->name('tasks_index');
    
    Route::post('/', function(Request $request) {
	$validator = Validator::make($request->all(), [
		    'name' => 'required|max:255',
	]);

	if ($validator->fails()) {
	    return redirect(route('tasks_index'))
			    ->withInput()
			    ->withErrors($validator);
	}
	$task = new Task();
	$task->name = $request->name;
	$task->save();
	return redirect(route('tasks_index'));
    })->name('tasks_store');

    Route::get('/{task}/edit', function(Task $task) {

	return view('tasks.edit', [
	    'task' => $task,
	]);
    })->name('tasks_edit');

    Route::delete('/{task}', function(Task $task) {
	$task->delete();
	return redirect(route('tasks_index'));
    })->name('tasks_destroy');

    Route::put('/{task}', function(Request $request, Task $task) {
	$validator = Validator::make($request->all(), [
		    'name' => 'required|max:255',
	]);
	if ($validator->fails()) {
	    return redirect(route('tasks_edit', $task->id))
			    ->withInput()
			    ->withErrors($validator);
	}
	$task->name = $request->name;
	$task->save();
	return redirect(route('tasks_index'));
    })->name('tasks_update');
});

Route::get('/news', function(){
    $news = News::all();
    return view('news.index', [
	'news' => $news,
    ]);
})->name('news_index');

Route::get('/news/{news}', function(News $news){
   $news_item = News::find($news->id);
   var_dump($news_item);
})->name('news_show');



//ссылка на новости на главной странице
//префикс роутов на новости будет назыв. news
//новость будет характеризоваться: заголовок, текст, временные метки
//индексное действие отображает название новостей , которые является ссылками которые отображает конкретную новость.

