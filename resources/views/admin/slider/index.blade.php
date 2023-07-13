@extends('layouts.backend.main')
@push('css')
       
@endpush
@section('content')

                                                  
<div class="row">
	<div class="col-12">
		<div class="card" style="magin-top:2px;">
			<div class="card-body">
				<div class="row">
					<div class="col-2"><h4 class="header-title">All Slider</h4></div>
					<div class="col-8"></div>
					<div class="col-2">
						<a class="btn btn-outline-success mb-1 d-block" href="{{ route('admin.slider.create') }}">
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
                        <th>Sub Title</th>
                        <th>Title</th>
                        <th>Body</th>
                        <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                    	 @foreach($sliders as $key=>$slider)
                        <tr>
                         <td>{{ $key +1 }}</td>
                        <td>{{ \Illuminate\Support\Str::limit($slider->sub_title,'10') }}</td>
                        <td>{{ \Illuminate\Support\Str::limit($slider->title,'15') }}</td>
                        <td>{{ \Illuminate\Support\Str::limit($slider->body,'30') }}</td>

                        <td><img src="{{ asset('storage/slider/'.$slider->image) }}" width="80" height="60"></td>

                        <td class="table-action">
                        <form action="{{ route('admin.slider.destroy',$slider->id) }}" method="POST">
                        <a class="btn btn-primary" href="{{ route('admin.slider.edit',$slider->id) }}"><i class="mdi mdi-pencil"></i></a>
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