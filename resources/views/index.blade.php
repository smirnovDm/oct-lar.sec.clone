<!-- resources/views/tasks.blade.php -->

@extends('layouts.app')

@section('content')

<h2>
    Hello!!!
</h2>
<p>You can see all tasks <a href="{{route('tasks_index')}}">Show Tasks</a></p>
<p>You can see all news <a href="{{route('news_index')}}">Show news</a></p>
@endsection

