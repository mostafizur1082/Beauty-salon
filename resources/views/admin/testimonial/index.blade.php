@extends('layouts.backend.main')
@push('css')
       
@endpush
@section('content')

                                                  
<div class="row">
	<div class="col-12">
		<div class="card" style="magin-top:2px;">
			<div class="card-body">
				<div class="row">
					<div class="col-2"><h4 class="header-title">All Testimonial</h4></div>
					<div class="col-8"></div>
					<div class="col-2">
						<a class="btn btn-outline-success mb-1 d-block" href="{{ route('admin.testimonial.create') }}">
                        Add
                        </a>
					</div>
				</div>

				@if(session()->has('message'))
    			<div class="alert alert-success">
       		    {{ session()->get('message') }}
    			</div>
				@endif

				@if(session()->has('delete'))
    			<div class="alert alert-danger">
       		    {{ session()->get('delete') }}
    			</div>
				@endif
				
					<ul class="nav nav-tabs nav-bordered mb-3">
					<li class="nav-item">
					</li>
				    </ul> <!-- end nav-->

	<div class="tab-content">
         <div class="tab-pane show active" id="striped-rows-preview">
            <div class="table-responsive-sm">
                 <table class="table table-bordered table-centered mb-0">
                    <thead>
                        <tr>
                        <th>id</th>
                        <th>Name</th>
                        <th>Title</th>
                        <th>Body</th>
                        <th>Image</th>
                        <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                    	 @foreach($testimonials as $key=>$testimonial)
                        <tr>
                         <td>{{ $key +1 }}</td>
                         <td>{{ $testimonial->name }}</td>
                         <td>{{ $testimonial->title }}</td>
                        
                        <td>{{ \Illuminate\Support\Str::limit($testimonial->body,'30') }}</td>

                        <td><img src="{{ asset('storage/testimonial/'.$testimonial->image) }}" width="80" height="60"></td>

                        <td class="table-action">
                        <form action="{{ route('admin.testimonial.destroy',$testimonial->id) }}" method="POST">
                        <a class="btn btn-primary" href="{{ route('admin.testimonial.edit',$testimonial->id) }}"><i class="mdi mdi-pencil"></i></a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger"><i class="mdi mdi-delete"></i></button></form>
                        </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div> <!-- end table-responsive-->                     
        </div> <!-- end preview-->
                                        
                                            
    </div> <!-- end tab-content-->

	</div> <!-- end card body-->
    </div> <!-- end card -->
</div><!-- end col-->
</div> <!-- end row-->

@endsection
@push('js')

@endpush