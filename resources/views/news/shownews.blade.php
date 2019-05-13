@extends('layouts.app')
@section('content')
<div class="panel-body" style="width: 30%; margin-top: 50px; margin-right: auto; margin-left: auto;">
    <ul class="list-group">
        <li class="list-group-item">{{$news_title}}</li>
        <li class="list-group-item">{{$news_text}}</li>
</div>

@endsection