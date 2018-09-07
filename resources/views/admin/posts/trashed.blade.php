@extends('layouts.app')

@section('content')

	<div class="panel panel-default">
		<div class="panel-heading">
			Thrashed Posts
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
						Restore
					</th>
					<th>
						Destroy
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
							<a href="{{ route('post.restore',['id'=>$row->id]) }}" class="btn btn-xs btn-success">Restore</a>
						</td>
						<td>
							<a href="{{ route('post.kill',['id'=>$row->id]) }}" class="btn btn-xs btn-danger">Destroy</a>
						</td>
					</tr>
					@endforeach

				@else
					<tr>
						<th colspan="5" class="text-center">No Trashed posts Found</th>
					</tr>	
				@endif	
				</tbody>
			</table>
		</div>
	</div>
@endsection