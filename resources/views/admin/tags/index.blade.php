@extends('layouts.app')

@section('content')

	<div class="panel panel-default">
		<div class="panel-heading">
			Tags
		</div>
		<div class="panel-body">
			<table class="table table-hover">
				<thead>
					<th>
						Tag Name
					</th>
					<th>
						Editing
					</th>
					<th>
						Deleting
					</th>
				</thead>
				<tbody>
				@if( $tags->count() > 0 )
					@foreach( $tags as $row )

					<tr>
						<td>
							{{ $row->tag }}
						</td>
						<td>
							<a href="{{ route('tag.edit',['id'=>$row->id]) }}" class="btn btn-xs btn-info">
								<span class="gyphicon gyphicon-pencil">Edit</span>
							</a>
						</td>
						<td>
							<a href="{{ route('tag.delete',['id'=>$row->id]) }}" class="btn btn-xs btn-danger">
								<span class="gyphicon gyphicon-trash">Delete</span>
							</a>
						</td>
					</tr>
					@endforeach
					@else
					<tr>
						<th colspan="5" class="text-center">No Tags Found</th>
					</tr>	
				@endif
				</tbody>
			</table>
		</div>
	</div>
@endsection