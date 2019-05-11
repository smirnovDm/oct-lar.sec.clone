@extends('layouts.app')
@section('content')
@if (count($news) > 0)


    <div class="panel-body">
        <table class="table table-striped task-table">

	    <!-- Заголовок таблицы -->
	    <thead>
		<tr>
		    <th>Заголовок</th>  
		</tr>
	    </thead>

	    <!-- Тело таблицы -->
	    <tbody>
		@foreach ($news as $news_item)
		<tr>
		    <!-- Имя задачи -->
		    <td class="table-text">
			<div><a href="{{route('news_show', $news_item->id)}}">{{ $news_item->title }}</a></div>
		    </td>

		    <td>
	</table>
    </div>
    @endforeach
    @endif
    @endsection