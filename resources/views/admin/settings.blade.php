@extends('layouts.backend.main')
@section('content')
<br>
<div class="container-fluid">
                      <!-- start page title -->
                        <!-- end page title -->
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

                        <div class="row">
                            <div class="col-xl-4 col-lg-5">
                                <div class="card text-center">
                                    <div class="card-body">
                                        <img src="{{ asset('storage/profile/'.Auth::user()->image) }}" class="rounded-circle avatar-lg img-thumbnail"
                                        alt="profile-image">

                                        <h4 class="mb-0 mt-2">{{ Auth::user()->name }}</h4>
                                        <p class="text-muted font-14">{{ Auth::user()->email }}</p>
                                    </div> <!-- end card-body -->
                                </div> <!-- end card -->

                                

                            </div> <!-- end col-->

                            <div class="col-xl-8 col-lg-7">
                                <div class="card">
                                    <div class="card-body">
                                        <ul class="nav nav-pills bg-nav-pills nav-justified mb-3">
                                            <li class="nav-item">
                                                <a href="#aboutme" data-bs-toggle="tab" aria-expanded="false" class="nav-link rounded-0">
                                                    Password
                                                </a>
                                            </li>
                                            
                                            <li class="nav-item">
                                                <a href="#settings" data-bs-toggle="tab" aria-expanded="false" class="nav-link rounded-0">
                                                    Update Profile
                                                </a>
                                            </li>
                                        </ul>
                                        <div class="tab-content">
                                            <div class="tab-pane" id="aboutme">
    
                                                <h5 class="text-uppercase"><i class="mdi mdi-briefcase me-1"></i>
                                                    Change Password</h5>
                                                    @if ($errors->any())
													<div class="alert alert-danger">
													<ul>
													@foreach ($errors->all() as $error)
													<li>{{ $error }}</li>
													@endforeach
													</ul>
													</div>
													@endif

                                                <div class="timeline-alt pb-0">
                                                    <div class="timeline-item">
                                                        
                                                    <form action="{{ route('admin.password.update') }}" method="POST">
                                                	@csrf
                                                	@method('PUT')
                                                	<div class="row">
                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label for="old_password" class="form-label"> Old Password</label>
                                                                <input type="password" class="form-control" id="old_password" placeholder="Enter name" name="old_password">
                                                            </div>
                                                        </div>
                                                    
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label for="password" class="form-label"> Password</label>
                                                                <input type="password" class="form-control" id="password" placeholder="Enter name" name="password">
                                                            </div>
                                                        </div>
                                                    
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label for="password_confirmation" class="form-label"> Confirm Password</label>
                                                                <input type="password" class="form-control" id="password_confirmation" placeholder="Enter name" name="password_confirmation">
                                                            </div>
                                                        </div>
                                                    
                                                    </div>
                                                    <button type="submit" class="btn btn-success mt-2"><i class="mdi mdi-content-save"></i> Save</button>
                                                </form>
                                                    </div>
    
                                                    

                                                </div>
                                                <!-- end timeline -->        

                                                
    
                                            </div> <!-- end tab-pane -->
                                            <!-- end about me section content -->
    
                                        
                                            <!-- end timeline content-->
    
                                            <div class="tab-pane" id="settings">
                                            		@if ($errors->any())
													<div class="alert alert-danger">
													<ul>
													@foreach ($errors->all() as $error)
													<li>{{ $error }}</li>
													@endforeach
													</ul>
													</div>
													@endif
                                                <form action="{{ route('admin.update.profile') }}" method="POST" enctype="multipart/form-data">
                                                	@csrf
                                                	@method('PUT')
                                                    <h5 class="mb-4 text-uppercase"><i class="mdi mdi-account-circle me-1"></i> Personal Info</h5>
                                                    
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label for="firstname" class="form-label"> Name</label>
                                                                <input type="text" class="form-control" id="firstname" placeholder="Enter name" name="name" value="{{ Auth::user()->name }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label for="email" class="form-label">Email</label>
                                                                <input type="email" class="form-control" id="email" placeholder="Enter last name" name="email" value="{{ Auth::user()->email }}">
                                                            </div>
                                                        </div> <!-- end col -->
                                                    </div> <!-- end row -->
    
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="mb-3">
                                                                <label for="userbio" class="form-label">About</label>
                                                                <textarea class="form-control" id="userbio" rows="4" placeholder="Write something..." name="about">{{ Auth::user()->about }}</textarea>
                                                            </div>
                                                        </div> <!-- end col -->
                                                    </div> <!-- end row -->

                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="mb-3">
                                                                <label for="image" class="form-label">Image</label>
                                                                <input type="file" class="form-control" name="image">
                                                            </div>
                                                        </div> <!-- end col -->
                                                    </div> <!-- end row -->
    
                                                   
                                                    
                                                    <div class="text-end">
                                                        <button type="submit" class="btn btn-success mt-2"><i class="mdi mdi-content-save"></i> Save</button>
                                                    </div>
                                                </form>
                                            </div>
                                            <!-- end settings content-->
    
                                        </div> <!-- end tab-content -->
                                    </div> <!-- end card body -->
                                </div> <!-- end card -->
                            </div> <!-- end col -->
                        </div>
                        <!-- end row-->

                    </div>
@endsection