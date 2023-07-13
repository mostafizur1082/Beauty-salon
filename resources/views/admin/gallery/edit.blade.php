@extends('layouts.backend.main')

@section('content')

<div class="row">
	<div class="col-lg-6">
		<div class="card">
			<div class="card-body">
				<div class="row">
					<div class="col-4">
						<h4 class="header-title" mb-1>Update Gallery</h4>
					</div>
					<div class="col-2"></div>
					<div class="col-6">
						<a class="btn btn-outline-success mb-1 d-block" href="{{ route('admin.gallery.index') }}">
							All Photos
						</a>
					</div>
				</div>
				@if ($errors->any())
				<div class="alert alert-danger">
					<ul>
						@foreach ($errors->all() as $error)
						<li>{{ $error }}</li>
						@endforeach
					</ul>
				</div>
				@endif
				<ul class="nav nav-tabs nav-bordered mb-3">
					<li class="nav-item"></li>
					</ul> <!-- end nav-->
					<div class="tab-content">
						<div class="tab-pane show active" id="basic-form-preview">
						<form method="POST" action="{{ route('admin.gallery.update',$gallery->id) }}" enctype="multipart/form-data">
							@csrf
							@method('PUT')
								<div class="mb-3">
								<label for="title" class="form-label">Title</label>
								<input type="text" class="form-control" id="title" placeholder="Enter gallery Title" name="title" value="{{ $gallery->title }}">
									
								</div>
								<div class="mb-3">
								<input type="file" class="form-control" name="image">
								</div>
								<button type="submit" class="btn btn-primary">Submit</button>
							</form>
						</div> <!-- end preview-->
							
					</div> <!-- end tab-content-->
				</div> <!-- end card-body-->
			</div> <!-- end card-->
		</div>
	</div>
@endsection