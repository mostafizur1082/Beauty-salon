@extends('layouts.backend.main')

@section('content')

<div class="row">
	<div class="col-lg-6">
		<div class="card">
			<div class="card-body">
				<div class="row">
					<div class="col-4">
						<h4 class="header-title" mb-1>Create Slider</h4>
					</div>
					<div class="col-2"></div>
					<div class="col-6">
						<a class="btn btn-outline-success mb-1 d-block" href="{{ route('admin.slider.index') }}">
							All Slider
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
						<form method="POST" action="{{ route('admin.slider.store') }}" enctype="multipart/form-data">
							@csrf
								<div class="mb-3">
								<label for="sub_title" class="form-label">Sub Title</label>
								<input type="text" class="form-control" id="sub_title" placeholder="Enter sub title" name="sub_title" value="{{ old('sub_title') }}">
									
								

								
								<label for="title" class="form-label">Title</label>
								<input type="text" class="form-control" id="title" placeholder="Enter Title Name" name="title" value="{{ old('title') }}">
									
								</div>

								<div class="mb-3">
								
								<input type="file" class="form-control" name="image">
									
								</div>
								<div class="mb-3">
								<label for="body" class="form-label">Body</label>
  								<textarea class="form-control" rows="4" id="body" name="body" value="{{ old('body') }}"></textarea>
  								</div>
  								<br>
								<button type="submit" class="btn btn-primary">Submit</button>
							</form>
						</div> <!-- end preview-->
							
					</div> <!-- end tab-content-->
				</div> <!-- end card-body-->
			</div> <!-- end card-->
		</div>
	</div>
@endsection