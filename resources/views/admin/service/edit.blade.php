@extends('layouts.backend.main')
@push('css')
<link href="{{ asset('assets/backend') }}/vendor/simplemde/simplemde.min.css" rel="stylesheet" type="text/css" />  
@endpush
@section('content')
<div class="row">
	<div class="col-lg-12">
		<div class="card">
			<div class="card-body">
				<div class="row">
					<div class="col-4">
						<h4 class="header-title" mb-1>Servicve Page Content</h4>
					</div>
					<div class="col-5"></div>
					<div class="col-3">
						<a class="btn btn-outline-success mb-1 d-block" href="{{ route('admin.service.index') }}">
							All Service
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
				<div class="row">
					<ul class="nav nav-tabs nav-bordered mb-3">
						<li class="nav-item"></li>
						</ul> <!-- end nav-->
						<div class="tab-content">
							<div class="tab-pane show active" id="basic-form-preview">
								<form method="POST" action="{{ route('admin.service.update', $service->id) }}" enctype="multipart/form-data">
									@csrf
									@method('PUT')
								<div class="tab-content">
									<div class="tab-pane show active" id="input-types-preview">
										<form>
										<div class="row">
											
												<div class="col-lg-6">
													<div class="mb-3">
														<div class="mb-3">
															<label for="title" class="form-label">Title</label>
															<input type="text" class="form-control" id="title" placeholder="Enter Blog Title" name="title" value="{{ $service->title }}">
														</div>
															<div class="mb-3">
															<label for="Price" class="form-label">Price</label>
															<input type="text" class="form-control" id="Price" placeholder="Enter Price" name="price" value="{{ $service->price }}">
														</div>
														<div class="mb-3">
															<label for="image">Featured Image</label>
															<input type="file" id="image" class="form-control" name="image">
														</div>
														
													</div>
													</div> <!-- end col -->
													
													<div class="col-lg-6">
														<div class="mb-3">

															<label for="short_des" class="form-label">Short Description</label>
  															<textarea class="form-control" rows="4" id="short_des" name="short_des">{{ $service->short_des }}</textarea>


															
											</div> <!-- end col -->
								</div>
								<div class="row">
								<label for="long_des" class="form-label">Long Description</label>
									<!-- HTML -->
                             	<textarea id="simplemde1" name="long_des">
                             		{{ $service->long_des }}
                             	</textarea>
								</div>
								<div class="row">
									<div class="col-lg-3"><button type="submit" class="btn btn-primary">Submit</button></div>					
									<div class="col-lg-3"></div>					
									<div class="col-lg-3"></div>					
									<div class="col-lg-3"></div>					
								</div>					
							
							</form>
					</div> <!-- end preview-->
											
				</div> <!-- end tab-content-->
			</div> 
		</div> 
		</div> 
	</div> 
	</div> 
</div> 
	
@endsection
@push('js')
<!-- SimpleMDE js -->
<script src="{{ asset('assets/backend') }}/vendor/simplemde/simplemde.min.js"></script>
<!-- SimpleMDE demo -->
<script src="{{ asset('assets/backend') }}/js/pages/demo.simplemde.js"></script>
@endpush