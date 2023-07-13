@extends('layouts.frontend.main')

@section('content')

	<section class="inner-page-banner" style="background-image:url({{ asset('assets/frontend') }}/img/banner/pricing-banner.jpg)">
		<div class="page-banner-caption">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<h1>Pricing Plan</h1>
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
							<li class="breadcrumb-item active">Pricing Plan</li>
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
						<h2><span>Cheapest pricing plan</span></h2>
						<p>Our product is fully personalized and well balanced for all age of customers or adults. We maintain the standards by lorem ipsum and certified by dolor set amet.</p>
					</div>
				</div>
			</div>
			<div class="row">
				@foreach($services as $service)
				<div class="col-md-4">
					<div class="pricing-table wow fadeIn">
						<div class="thumb">
							<img src="{{ asset('storage/service/'.$service->image) }}" alt="">
						</div>
						<div class="pricing-info text-center">
							<h3>{{ $service->short_des }}</h3>
							<h2><sub>৳</sub>{{ $service->price }}</h2>
							<a href="{{ route('contact') }}" class="btn btn-default">Contact Us</a>
						</div>
					</div>
				</div>
				@endforeach
				
			</div>			
		</div>
	</section>
	<!-- end pricing -->
	
	<section class="section-spacing inverse-bg">
		<div class="container">
			<div class="row">
				<div class="col-sm-12 col-md-6">
					<div class="img-block wow fadeIn">
						<img src="{{ asset('assets/frontend') }}/img/why-choose/1.jpg" alt="">
						<div class="play-button">
							<a href="#" data-toggle="modal" data-target="#video-modal"><i class="fa fa-play"></i></a>
						</div>
					</div>
				</div>
				<div class="col-sm-12 col-md-6">
					<div class="text-block wow fadeIn">
						<h2>Why Choose us?</h2>
						<p>Our product is fully personalized and well balanced for all age of customers or adults. We maintain the standards by lorem ipsum and certified by dolor set amet.</p>
						<ul>
							<li>Created from natural herbs</li>
							<li>100% safe for your skin</li>
							<li>Unique from other spa treatments</li>
							<li>Created by medical professionals of spa lab</li>
							<li>Special gifts & offers for you</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- end why choose -->
	
	<section class="section-spacing">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-md-6">
					<div class="appoinment-text wow fadeIn">
						<h2>Make an Appointment?</h2>
						<p>Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos, In massa urna pellentesque habitant morbi tristique senectus.</p>
						<p>Call us : 002-6666-8888 or fill out our online booking & equiry form and we’ll contact you.</p>
						<a href="{{ route('appointment.index') }}" class="btn btn-primary">Make Appointment</a>
					</div>
				</div>
				<div class="col-md-6">
					<div class="appoinment-img text-md-right text-center wow fadeIn">
						<img class="tilt-img" src="{{ asset('assets/frontend') }}/img/appointment/1.png" alt="">
					</div>
				</div>
			</div>			
		</div>
	</section>
	<!-- end appointment -->
	

	
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