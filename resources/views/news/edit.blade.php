@extends('layouts.app')
@section('content')

<div class="panel-body">  

    @include('common.errors')

    <form action="{{route('news_update', $news_id)}}" method="POST" class="form-horizontal" style="margin-top: 20px; width: 50%; margin-left: auto; margin-right: auto;">
        {{method_field('PUT')}}
        {{ csrf_field() }}

        <div class="form-group">
            <input type="text" class="form-control" name="edit_title" value="{{$news_title}}" id="exampleFormControlInput1" placeholder="News title" required>
        </div>
        <div class="form-group">
            <textarea class="form-control" name="edit_text" id="exampleFormControlTextarea1" rows="3" placeholder="News content" required>{{$news_text}}</textarea>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-6">
                <button type="submit" class="btn btn-default bg-info">
                    <i class="fa fa-edit"></i> Edit news
                </button>
            </div>
        </div>
    </form>
</div>

@endsection
