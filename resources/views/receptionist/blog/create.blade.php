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
						<h4 class="header-title" mb-1>Create Blog</h4>
					</div>
					<div class="col-5"></div>
					<div class="col-3">
						<a class="btn btn-outline-success mb-1 d-block" href="{{ route('receptionist.blog.index') }}">
							All Blog Post
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
								<form method="POST" action="{{ route('receptionist.blog.store') }}" enctype="multipart/form-data">
									@csrf
									
								<div class="tab-content">
									<div class="tab-pane show active" id="input-types-preview">
										<form>
										<div class="row">
											
												<div class="col-lg-6">
													<div class="mb-3">
														<div class="mb-3">
															<label for="title" class="form-label">Title</label>
															<input type="text" class="form-control" id="title" placeholder="Enter Blog Title" name="title" value="{{ old('title') }}">
														</div>
														<div class="mb-3">
															<label for="image">Featured Image</label>
															<input type="file" id="image" class="form-control" name="image">
														</div>
														<div class="mb-3">
															<input type="checkbox" id="publish" class="form-check-input" name="status" value="1">
															<label for="publish" class="form-check-label">Publish</label>
														</div>
													</div>
													</div> <!-- end col -->
													
													<div class="col-lg-6">
														<div class="mb-3">
															<label for="example-multiselect" class="form-label">Category Select</label>
															<select id="example-multiselect" name="categories" multiple class="form-control">
																@foreach($categories as $category)
																<option value="{{ $category->id }}">{{ $category->name }}</option>
																@endforeach
															</select>
														</div>
														<div class="mb-3">
															<label for="example-multiselect" class="form-label">Tag Select</label>
															<select id="example-multiselect" name="tags" multiple class="form-control">
																@foreach($tags as $tag)
																<option value="{{ $tag->id }}">{{ $tag->name }}</option>
																@endforeach
																
															</select>
														</div>
											</div> <!-- end col -->
								</div>
								<div class="row">
									<!-- HTML -->
                             <textarea id="simplemde1" name="body"></textarea>
								</div>					
							<button type="submit" class="btn btn-primary">Submit</button>
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