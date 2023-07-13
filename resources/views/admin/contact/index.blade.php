@extends('layouts.backend.main')
@push('css')
       
@endpush
@section('content')

                                                  
<div class="row">
	<div class="col-12">
		<div class="card" style="magin-top:2px;">
			<div class="card-body">
				<div class="row">
					<div class="col-2"><h4 class="header-title">All Contact</h4></div>
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
                        <th>User Name</th>
                        <th>Email</th>
                        <th>Message</th>
                        <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                    	 @foreach($contacts as $key=>$contact)
                        <tr>
                        <td>{{ $key +1 }}</td>
                        <td>{{ $contact->name }}</td>
                        <td>{{ $contact->email }}</td>
                        <td>{{ \Illuminate\Support\Str::limit($contact->message,'50') }}</td>
                        <td class="table-action">
                        <form action="{{ route('admin.contact.destroy',$contact->id) }}" method="POST">
                        <a class="btn btn-primary" href="{{ route('admin.contact.edit',$contact->id) }}"><i class="ri-eye-line"></i></a>
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