@extends('layouts.app')
@section('content')
<div class="panel-body">
    <!-- Отображение ошибок проверки ввода -->
    @include('common.errors')

    <!-- Форма новой задачи -->
    <form action="{{route('news_store')}}" method="POST" class="form-horizontal" style="margin-top: 20px; width: 50%; margin-left: auto; margin-right: auto;">
	{{ csrf_field() }}

	<!-- Имя задачи -->
	
  <div class="form-group">
      <input type="text" class="form-control" name="title" id="exampleFormControlInput1" placeholder="News title" required>
  </div>
  <div class="form-group">
      <textarea class="form-control" name="text" id="exampleFormControlTextarea1" rows="3" placeholder="News content" required></textarea>
  </div>


	<!-- Кнопка добавления задачи -->
	<div class="form-group">
	    <div class="col-sm-offset-3 col-sm-6">
		<button type="submit" class="btn btn-default">
		    <i class="fa fa-plus"></i> Add news
		</button>
	    </div>
	</div>
    </form>
</div>
@endsection

