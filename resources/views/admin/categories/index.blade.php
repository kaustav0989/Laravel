@extends('layouts.app')

@section('content')

	<div class="panel panel-default">
		<div class="panel-heading">
			Categories
		</div>
		<div class="panel-body">
			<table class="table table-hover">
				<thead>
					<th>
						Category Name
					</th>
					<th>
						Editing
					</th>
					<th>
						Deleting
					</th>
				</thead>
				<tbody>
				@if( $categories->count() > 0 )
					@foreach( $categories as $row )

					<tr>
						<td>
							{{ $row->name }}
						</td>
						<td>
							<a href="{{ route('category.edit',['id'=>$row->id]) }}" class="btn btn-xs btn-info">
								<span class="gyphicon gyphicon-pencil">Edit</span>
							</a>
						</td>
						<td>
							<a href="{{ route('category.delete',['id'=>$row->id]) }}" class="btn btn-xs btn-danger">
								<span class="gyphicon gyphicon-trash">Delete</span>
							</a>
						</td>
					</tr>
					@endforeach
					@else
					<tr>
						<th colspan="5" class="text-center">No Categories Found</th>
					</tr>	
				@endif
				</tbody>
			</table>
		</div>
	</div>
@endsection