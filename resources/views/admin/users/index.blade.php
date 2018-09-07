@extends('layouts.app')

@section('content')

	<div class="panel panel-default">
		<div class="panel-heading">
			Users
		</div>
		<div class="panel-body">
			<table class="table table-hover">
				<thead>
					<th>
						Image
					</th>
					<th>
						Name
					</th>
					<th>
						Permissions
					</th>
					<th>
						Delete
					</th>
				</thead>
				<tbody>
				@if( $users->count() > 0 )
					@foreach( $users as $row )

					<tr>
						<td>
							<img src="{{ asset($row->profile->avatar) }}" alt="{{ $row->name }}" height="30px" width="50px" style="border-radius: 50%">
						</td>
						<td>
							{{ $row->name }}
						</td>
						<td>
							@if( $row->admin )
								<a href="{{route('user.not.admin',['id'=>$row->id])}}" class="btn btn-xs btn-danger">Remove from admin</a>						
							@else
								<a href="{{route('user.admin',['id'=>$row->id])}}" class="btn btn-xs btn-success">Make Admin</a>
							@endif
						</td>
						<td>
							@if( Auth::user()->id != $row->id )
								<a href="{{route('user.delete',['id'=>$row->id])}}" class="btn btn-xs btn-danger">Delete</a>
							@endif
						</td>
					</tr>
					@endforeach
				@else
					<tr>
						<th colspan="5" class="text-center">No Users Found</th>
					</tr>	
				@endif	
				</tbody>
			</table>
		</div>
	</div>
@endsection