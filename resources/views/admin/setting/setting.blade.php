@extends('layouts.app')

@section('content')

	<div class="panel panel-default">
		<div class="panel-heading">
			Edit Blog Settings
		</div>
		
		@include('admin.includes.errors')

		<div class="panel-body">
			<form action="{{ route('settings.update') }}" method="post">
			{{ csrf_field() }}
			<div class="form-group">
				<label for="name">Site_name</label>
				<input type="text" name="site_name" value="{{$setting->site_name}}" class="form-control">
			</div>

			<div class="form-group">
				<label for="email">Email</label>
				<input type="text" name="address" value="{{$setting->address}}" class="form-control">
			</div>

			<div class="form-group">
				<label for="email">Email</label>
				<input type="text" name="contact_number" value="{{$setting->contact_number}}" class="form-control">
			</div>

			<div class="form-group">
				<label for="email">Email</label>
				<input type="text" name="contact_email" value="{{$setting->contact_email}}" class="form-control">
			</div>

			<div class="form-group">
				<div class="text-center">
					<button class="btn btn-success" type="submit">
						Update Site Settings
					</button>
				</div>
			</div>
		</form>
		</div>	
	</div>

@endsection		