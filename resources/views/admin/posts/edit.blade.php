@extends('layouts.app')

@section('content')

	<div class="panel panel-default">
		<div class="panel-heading">
			<strong>Edit post {{ $post->title }}</strong>
		</div>

		@include('admin.includes.errors')
		
		<div class="panel-body">
			<form action="{{ route('post.update',['id'=>$post]) }}" method="post" enctype="multipart/form-data">
			{{ csrf_field() }}
			<div class="form-group">
				<label for="title">Title</label>
				<input type="text" name="title" value="{{ $post->title }}" class="form-control">
			</div>
			<div class="form-group">
				<label for="featured">Featured Image</label>
				<input type="file" name="featured" class="form-control">
			</div>
			<div class="form-group">
				<label for="category">Select a Category</label>
				<select name="category_id" id="category" class="form-control">
					@foreach($category as $row)
					<option value="{{ $row->id}}" <?php if($row->id == $post->category_id) echo 'selected'; ?> >{{$row->name}}</option>
					@endforeach
				</select>
			</div>
			<div class="form-group">
			<label for="tags">Select tags</label>	
			@foreach( $tags as $row ) 
			<div class="checkbox">
			    <label><input type="checkbox" name="tags[]" value="{{ $row->id }}"
			    	@foreach($post->tags as $t)
			    	@if( $row->id  == $t->id )
			    	 checked
			    	@endif
			    	@endforeach 

			    	> {{ $row->tag }}</label>
			  </div>
			@endforeach   
			</div> 
			<div class="form-group">
				<label for="content">Content</label>
				<textarea name="content" id="content" rows="5" cols="5" class="form-control">{{ $post->content }}</textarea>
			</div>
			<div class="form-group">
				<div class="text-center">
					<button class="btn btn-success">
						Update post
					</button>
				</div>
			</div>
		</form>
		</div>	
	</div>
@endsection	

@section('styles')
	<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.css" rel="stylesheet">
@endsection

@section('scripts')
	<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.js"></script>

	<script>
	   $(document).ready(function() {
	       $('#content').summernote();
	   });
	 </script>
@endsection