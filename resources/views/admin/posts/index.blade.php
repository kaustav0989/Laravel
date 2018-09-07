@extends('layouts.app')

@section('content')

	<div class="panel panel-default">
		<div class="panel-heading">
			Posts
		</div>
		<div class="panel-body">
			<table class="table table-hover">
				<thead>
					<th>
						Image
					</th>
					<th>
						Title
					</th>
					<th>
						Editing
					</th>
					<th>
						Trashing
					</th>
				</thead>
				<tbody>
				@if( $posts->count() > 0 )
					@foreach( $posts as $row )

					<tr>
						<td>
							<img src="{{ asset($row->featured) }}" alt="{{ $row->title }}" height="30px" width="50px">
						</td>
						<td>
							{{ $row->title }}
						</td>
						<td>
							<a href="{{ route('post.edit',['id'=>$row->id]) }}" class="btn btn-primary">Edit</a>
						</td>
						<td>
							<a href="{{ route('post.delete',['id'=>$row->id]) }}" class="btn btn-danger">Trash</a>
						</td>
					</tr>
					@endforeach
				@else
					<tr>
						<th colspan="5" class="text-center">No published posts Found</th>
					</tr>	
				@endif	
				</tbody>
			</table>
		</div>
	</div>
@endsection