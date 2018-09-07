@extends('layouts.app')

@section('content')

	<div class="panel panel-default">
		<div class="panel-heading">
			Edit Category
		</div>
		
		@include('admin.includes.errors')

		
		<div class="panel-body">

			@foreach( $category as $row )

			<form action="{{ route('category.update',['id'=>$row->id]) }}" method="post">
			{{ csrf_field() }}
			<div class="form-group">
				<label for="name">Title</label>
				<input type="text" name="name" value="{{ $row->name }}" class="form-control">
			</div>
			<div class="form-group">
				<div class="text-center">
					<button class="btn btn-success" type="submit">
						Store Category
					</button>
				</div>
			</div>
		</form>

		@endforeach
		</div>	
	</div>

@endsection