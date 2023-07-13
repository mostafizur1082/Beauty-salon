@extends('layouts.backend.main')

@section('content')

<div class="row">
	<div class="col-lg-6">
		<div class="card">
			<div class="card-body">
				<div class="row">
					<div class="col-4">
						<h4 class="header-title" mb-1>Update Category</h4>
					</div>
					<div class="col-2"></div>
					<div class="col-6">
						<a class="btn btn-outline-success mb-1 d-block" href="{{ route('receptionist.category.index') }}">
							All Category
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
						<form method="POST" action="{{ route('receptionist.category.update',$category->id) }}" enctype="multipart/form-data">
							@csrf
							@method('PUT')
								<div class="mb-3">
								<label for="category_name" class="form-label">Name</label>
								<input type="text" class="form-control" id="category_name" aria-describedby="emailHelp" placeholder="Enter category Name" name="name" value="{{ $category->name }}">
									
								</div>

								<input type="file" class="form-control" name="image">
								
								<button type="submit" class="btn btn-primary">Submit</button>
							</form>
						</div> <!-- end preview-->
							
					</div> <!-- end tab-content-->
				</div> <!-- end card-body-->
			</div> <!-- end card-->
		</div>
	</div>
@endsection