<?php

use Illuminate\Http\Request;
use App\Task;
use App\News;

Route::get('/', function() {
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


//=====================================NEWS ROUTE TREE====================
Route::group(['prefix' => 'news'], function() {
    Route::get('/', function() {
        $news = News::all();
        return view('news.index', [
            'news' => $news,
        ]);
    })->name('news_index');

    Route::get('/create', function() {
        return view('news.create');
    })->name('create_news');

    Route::get('/{news}', function(News $news) {
        $news_item = News::find($news->id);
        return view('news.shownews', [
            'news_title' => $news_item->title,
            'news_text' => $news_item->text,
        ]);
    })->name('news_show');

    Route::post('/', function(Request $request) {
        $validator = Validator::make($request->all(), [
                    'title' => 'required|max:255',
        ]);

        if ($validator->fails()) {
            return redirect(route('create_news'))
                            ->withInput()
                            ->withErrors($validator);
        }

        $news = new News();
        $news->title = $request->title;
        $news->text = $request->text;
        $news->save();
        return redirect(route('news_index'));
    })->name('news_store');

    Route::delete('/{news}', function(News $news) {
        $news->delete();
        return redirect(route('news_index'));
    })->name('news_destroy');

    Route::get('/{news}/edit', function(News $news) {
        return view('news.edit', [
            'news_title' => $news->title,
            'news_text' => $news->text,
            'news_id' => $news->id,
        ]);
    })->name('news_edit');

    Route::put('/{news}', function(Request $request, News $news) {
        $validator = Validator::make($request->all(), [
                    'edit_title' => 'required|max:255',
        ]);
        if ($validator->fails()) {
            return redirect(route('news_edit', $news->id))
                            ->withInput()
                            ->withErrors($validator);
        }
        $news->title = $request->edit_title;
        $news->text = $request->edit_text;
        $news->save();
        return redirect(route('news_index'));
    })->name('news_update');
});


//ссылка на новости на главной странице
//префикс роутов на новости будет назыв. news
//новость будет характеризоваться: заголовок, текст, временные метки
//индексное действие отображает название новостей , которые является ссылками которые отображает конкретную новость.

