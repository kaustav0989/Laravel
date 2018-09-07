@extends('layouts.app')

@section('content')

	<div class="panel panel-default">
		<div class="panel-heading">
			Edit Tag
		</div>
		
		@include('admin.includes.errors')

		
		<div class="panel-body">


			@foreach( $tags as $row )


			<form action="{{ route('tag.update',['id'=>$row->id]) }}" method="post">
			{{ csrf_field() }}
			<div class="form-group">
				<label for="tag">Tag</label>
				<input type="text" name="tag" value="{{ $row->tag }}" class="form-control">
			</div>
			<div class="form-group">
				<div class="text-center">
					<button class="btn btn-success" type="submit">
						Update Tag
					</button>
				</div>
			</div>
		</form>

		@endforeach
		</div>	
	</div>

@endsection