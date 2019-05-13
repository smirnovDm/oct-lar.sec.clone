@extends('layouts.app')
@section('content')
@if (count($news) > 0)


<div class="panel-body">

    <form action="{{route('create_news')}}" method="POST">
        {{csrf_field()}}
        {{method_field('get')}}
        <input class="btn btn-primary" type="submit" value="Add news" style="margin: 10px;">
    </form>

    <table class="table table-striped task-table">

        <!-- Заголовок таблицы -->
        <thead>
            <tr>
                <th>Title</th>
                <th>Action</th>
                <th>Action</th>
            </tr>

        </thead>

        <!-- Тело таблицы -->
        @foreach ($news as $news_item)
        <tbody>

            <tr>
                <!-- Имя задачи -->
                <td class="table-text">
                    <div><a href="{{route('news_show', $news_item->id)}}">{{ $news_item->title }}</a></div>
                </td>

                <td>
                    <form action="{{route('news_destroy', $news_item->id)}}" method="POST">
                        {{csrf_field()}}
                        {{method_field('delete')}}

                        <button type="submit" class="btn btn-default">
                            <i class="fa fa-trash"></i> Delete
                        </button>

                    </form>
                </td>
                <td>
                    <form action="{{route('news_edit', $news_item->id, '/edit')}}" method="GET">
                        {{csrf_field()}}
                        
                        <button type="submit" class="btn btn-edit">
                            <i class="fa fa-edit"></i> Edit
                        </button>

                    </form>
                </td>
            </tr>
            @endforeach       
    </table>
</div>
@endif
<form action="{{route('create_news')}}" method="POST">
    {{csrf_field()}}
    {{method_field('get')}}
    <input class="btn btn-primary" type="submit" value="Add news" style="margin-left: 10px;">
</form>



@endsection