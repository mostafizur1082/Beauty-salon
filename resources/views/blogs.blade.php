@extends('layouts.frontend.main')

@section('content')
	<section class="inner-page-banner" style="background-image:url({{ asset('assets/frontend') }}/img/banner/blog-banner.jpg)">
		<div class="page-banner-caption">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<h1>Latest News</h1>
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
							<li class="breadcrumb-item active">Blog</li>
						</ol>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- end banner -->
	
	<section class="section-spacing">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="section-title text-center">
						<h2><span>Latest news</span></h2>
						<p>Our product is fully personalized and well balanced for all age of customers or adults. We maintain the standards by lorem ipsum and certified by dolor set amet.</p>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-8">
					@foreach($blogs as $blog)
					<div class="news-block">
						<div class="news-thumb">
							<img src="{{ asset('storage/blog/'.$blog->image) }}" alt="">
							<div class="overlay">
								<a href="{{ route('blog.details',$blog->id) }}"><i class="fa fa-link"></i></a>
							</div>
						</div>
						<div class="news-bottom">
							<ul class="post-meta list-inline">
								<li class="list-inline-item"><a href="#"><i class="fa fa-user"></i> {{ $blog->user->name }}</a></li>
								<li class="list-inline-item"><i class="fa fa-calendar"></i> {{ $blog->created_at->diffForHumans() }}</li>
								{{-- <li class="list-inline-item"><i class="fa fa-eye"></i> {{ $blog->view_count }}</li> --}}
							</ul>
							<h3><a href="{{ route('blog.details',$blog->id) }}">{{ $blog->title }}</a></h3>
							<p>{{ \Illuminate\Support\Str::limit($blog->body,'100') }}</p>
							<a href="{{ route('blog.details',$blog->id) }}" class="btn btn-link">Continue Reading <i class="fa fa-angle-double-right"></i></a>
						</div>
					</div>
					
					@endforeach
					
					<div class="pagination-container">
						
						<li>{{ $blogs->links('vendor.pagination.custom') }}</li>
					</div>

				</div>
				
				<div class="col-md-4">
					<div class="sidebar">
						<div class="sidebar-item">
							<form method="post" action="#">
								<div class="input-group">
									<input type="text" class="form-control" placeholder="Enter keyword..." name="search">
									<span class="input-group-addon"><button type="submit"><i class="fa fa-search"></i></button></span>
								</div>
							</form>
						</div>
						<!--end sidebar-item-->	
						
						<div class="sidebar-item sidebar-widget">
							<h3>Categories</h3>
							<ul class="category-list">
								@foreach($categories as $category)
								<li><a href="">{{ $category->name }}</a></li>
								@endforeach
								
							</ul>
						</div>
						<!--end sidebar-item-->	
							
						
						<!--end sidebar-item-->	
						
						<div class="sidebar-item sidebar-widget">
							<h3>Tag Cloudes</h3>
							<ul class="tag-list">
								@foreach($tags as $tag)
								<li><a href="">{{ $tag->name }}</a></li>
								@endforeach
								
							</ul>
						</div><!--end sidebar-item-->		
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- end news -->
	

	
	<!-- Bact to top -->
	<div class="back-top">
		<a href="#"><i class="fa fa-angle-up"></i></a>
	</div>
	
	<!-- Appointment Modal -->
    <div class="modal fade modal-vcenter" id="appointment" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h2>REQUEST AN APPOINTMENT</h2>
                </div>
                <div class="modal-body">
					<form id="reservation-form" method="post" data-toggle="validator">
						<div class="row">
							<div class="col-xs-12 col-sm-6">
								<div class="form-group">
									<label>First Name*</label>
									<input type="text" id="rfname" class="form-control" name="fname" required data-error="Please enter your first name">
									<div class="help-block with-errors"></div>
								</div>
							</div>
							
							<div class="col-xs-12 col-sm-6">
								<div class="form-group">
									<label>Last Name</label>
									<input type="text" id="rlname" class="form-control" name="lname" >
								</div>
							</div>
						</div>
						
						<div class="row">
							<div class="col-xs-12 col-sm-6">
								<div class="form-group">
									<label>Email*</label>
									<input type="email" id="remail" class="form-control" name="email" required data-error="Please enter valid email address">
									<div class="help-block with-errors"></div>
								</div>
							</div>
							
							<div class="col-xs-12 col-sm-6">
								<div class="form-group">
									<label>Phone*</label>
									<input type="tel" id="rphone" class="form-control" name="phone" required data-error="Please enter your phone number">
									<div class="help-block with-errors"></div>
								</div>
							</div>
							
						</div>
						
						<div class="form-group">
							<label>Address</label>
							<input type="text" id="raddress" class="form-control" name="address">
						</div>
						
						<div class="row">
							<div class="col-xs-12 col-sm-4">
								<div class="form-group">
									<label>Zip Code</label>
									<input type="text" id="rzipcode" class="form-control" name="zipcode">
								</div>
							</div>
							
							<div class="col-xs-12 col-sm-8">
								<div class="form-group">
									<label>City</label>
									<input type="text" id="rcity" class="form-control" name="city">
								</div>
							</div>
						</div>
						
						<div class="form-group">
							<label>Service</label>
							<select id="rselect-service" class="select-option" name="service">
								<option value="Herbal Spa">Herbal Spa</option>
								<option value="Skin Care">Skin Care</option>
								<option value="Stone Message">Stone Message</option>
								<option value="Body Message">Body Message</option>
								<option value="Aromatherapy">Aromatherapy</option>
								<option value="Hydrotherapy">Hydrotherapy</option>
							</select>
						</div>
						
						<div class="row">
							<div class="col-xs-12 col-sm-6">
								<div class="form-group">
									<label>Reservation Date*</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-calendar"></i>
										</div>
										<input type="text" id="rdate" class="form-control date-pic" name="date" placeholder="mm/dd/yyyy" required data-error="Please select reservation date">
									</div><!-- /.input group -->
									<div class="help-block with-errors"></div>
								</div>
							</div>
							
							<div class="col-xs-12 col-sm-6">
								<div class="bootstrap-timepicker">
									<div class="form-group">
										<label>Time picker*</label>
										<div class="input-group">
											<div class="input-group-addon">
												<i class="fa fa-clock-o"></i>
											</div>
											<input type="text" id="rtime" name="time" class="form-control timepicker" required data-error="Please select reservation time">
										</div><!-- /.input group -->
										<div class="help-block with-errors"></div>
									</div><!-- /.form group -->
								</div>
							</div>
						</div>
						
						<div class="submit-block text-right">
							<a href="#" class="btn btn-default" data-dismiss="modal">Cancel</a>
							<input value="Submit" name="submit" class="btn btn-primary" type="submit">
						</div>
						
						<div id="msgSubmitRes" class="h3 text-center hidden"></div>
					</form>
                </div>
            </div>
        </div>
    </div>
@endsection