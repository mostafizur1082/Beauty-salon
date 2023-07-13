@extends('layouts.frontend.main')

@section('content')
	
	<section class="inner-page-banner" style="background-image:url({{ asset('assets/frontend') }}/img/banner/contact-banner.jpg)">
		<div class="page-banner-caption">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<h1>Contact Us</h1>
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
							<li class="breadcrumb-item active">Contact Us</li>
						</ol>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- end banner -->
			<div class="row">
				@if(session()->has('message'))
    			<div class="alert alert-success">
       		    {{ session()->get('message') }}
    			</div>
				@endif
			</div>	
	
	<section class="section-spacing">
		<div class="container">
			<div class="row">
				<div class="col-md-4">
					<div class="contact-info text-center wow fadeIn">
						<i class="fa fa-phone-square"></i>
						<h3>Make a Call</h3>
						<p><a href="+880 1671450339">+880 1671450339</a>
					</div>
				</div>
				
				<div class="col-md-4">
					<div class="contact-info text-center wow fadeIn">
						<i class="fa fa-envelope-open-o"></i>
						<h3>Send a Mail</h3>
						<p><a href="sahib3@gmail.com">sahib3@gmail.com</a>
					</div>
				</div>
				
				<div class="col-md-4">
					<div class="contact-info text-center wow fadeIn">
						<i class="fa fa-map-marker"></i>
						<h3>Find Us</h3>
						<p>Senpara <br>Mirpur 10</p>
					</div>
				</div>
			</div>
			
			<div class="row">
				<div class="col-md-12">
					<div class="section-title text-center">
						<h2><span>Have Any Question?</span></h2>
					</div>
				</div>
			</div>
			
			<div class="row">
				<div class="col-md-12 col-lg-8 offset-lg-2">
					<form method="POST" action="{{ route('contact.store') }}">
							@csrf
								<div class="mb-3">
								<label for="name" class="form-label">Name</label>
								<input type="text" class="form-control" id="name" placeholder="Enter Name" name="name" value="{{ old('name') }}">
								</div>

								
								<div class="mb-3">
								<label for="email" class="form-label">email</label>
								<input type="email" class="form-control" id="email" placeholder="Enter email" name="email" value="{{ old('email') }}">
								</div>

								<div class="mb-3">
								<label for="message" class="form-label">message</label>
								<textarea placeholder="Your Comments" id="message" cols="20" rows="8" class="form-control" required data-error="Please enter your message" name="message" value="{{ old('message') }}"></textarea>
								</div>


								<button type="submit" class="btn btn-primary">Submit</button>
							</form>
				</div>
				
			</div>
			
		</div>
	</section>
	<!-- end contact -->
	
	<section class="section-spacing inverse-bg">
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