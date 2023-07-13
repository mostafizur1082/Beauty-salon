@extends('layouts.backend.main')
@push('css')
       
@endpush
@section('content')

                                                  
<div class="row">
	<div class="col-12">
		<div class="card" style="magin-top:2px;">
			<div class="card-body">
				<div class="row">
					<div class="col-2"><h4 class="header-title">All Pending Appointment</h4></div>
					<div class="col-8"></div>
					<div class="col-2">
					
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
                        <th>First Name</th>
                        <th>Mobile</th>
                        <th>Service</th>
                        <th>Status</th>
                        </tr>
                    </thead>

                    <tbody>
                    	 @foreach($appointments as $key=>$appointment)
                        <tr>
                        <td>{{ $key +1 }}</td>
                        <td>{{ $appointment->user->name }}</td>
                        <td>{{ $appointment->phone }}</td>
                        @foreach($appointment->services as $service)
                        <td>{{ $service->title }}</td>
                        @endforeach
                        <td>
                        	@if($appointment->status == true)
                        	<a href="{{ route('admin.appointment.approval',$appointment->id) }}" class="badge bg-primary">Approve</a>
                             @else
                             <a href="{{ route('admin.appointment.approval',$appointment->id) }}" class="badge bg-secondary">Pending</a>
                             @endif

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