@extends('layouts.app')
@section('content')
@if (count($news) > 0)


<div class="panel-body">

    <table class="table table-striped task-table">

        <!-- Заголовок таблицы -->
        <thead>
            <tr>
                <th>Заголовок</th>
                <th>Действие</th>
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
                            <i class="fa fa-trash"></i> Удалить
                        </button>

                    </form>
                </td>
                TODO!!!!!!!
<!--                <td>
                    <form action="{{route('news_edit', $task->id)}}" method="post">
                        {{csrf_field()}}
                        {{method_field('get')}}

                        <button type="submit" class="btn btn-default">
                            <i class="fa fa-edit"></i> Редактировать
                        </button>

                    </form>
                </td>-->
            </tr>
            @endforeach

    </table>

</div>

@endif
@endsection