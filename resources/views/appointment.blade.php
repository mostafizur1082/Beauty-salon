@extends('layouts.frontend.main')

@section('content')

<section class="inner-page-banner" style="background-image:url({{ asset('assets/frontend') }}/img/banner/about-banner.jpg)">
		<div class="page-banner-caption">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<h1>Appointment</h1>
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
							<li class="breadcrumb-item active">Appointment</li>
						</ol>
					</div>
				</div>
			</div>
		</div>
	</section>


	<section class="section-spacing inverse-bg">
		<div class="container">
			<div class="row">
				<div class="col-md-12 col-lg-8 offset-lg-2">
					
                    <h2>REQUEST AN APPOINTMENT</h2>
                
					<form method="POST" action="{{ route('appointment.store') }}">
							@csrf
							<div class="row">
							<div class="col-xs-12 col-sm-6">
								<div class="form-group">
									<label>First Name</label>
									<input type="text" id="rfname" class="form-control" name="first_name" required data-error="Please enter your first name" value="{{ old('first_name') }}">
									<div class="help-block with-errors"></div>
								</div>
							</div>
							<div class="col-xs-12 col-sm-6">
								<div class="form-group">
									<label>Last Name</label>
									<input type="text" id="rlname" class="form-control" name="last_name" value="{{ old('last_name') }}">
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-xs-12 col-sm-6">
								<div class="form-group">
									<label>Email</label>
									<input type="email" id="remail" class="form-control" name="email" required data-error="Please enter valid email address" value="{{ old('email') }}">
									<div class="help-block with-errors"></div>
								</div>
							</div>
							
							<div class="col-xs-12 col-sm-6">
								<div class="form-group">
									<label>Phone</label>
									<input type="tel" id="rphone" class="form-control" name="phone" required data-error="Please enter your phone number" value="{{ old('phone') }}">
									<div class="help-block with-errors"></div>
								</div>
							</div>
							
						</div>

						<div class="form-group">
							<label>Address</label>
							<input type="text" id="raddress" class="form-control" name="address" value="{{ old('address') }}">
						</div>

						<div class="row">
							<div class="col-xs-12 col-sm-4">
								<div class="form-group">
									<label>Zip Code</label>
									<input type="text" id="rzipcode" class="form-control" name="zip" value="{{ old('zip') }}">
								</div>
							</div>
							
							<div class="col-xs-12 col-sm-8">
								<div class="form-group">
									<label>City</label>
									<input type="text" id="rcity" class="form-control" name="city" value="{{ old('city') }}">
								</div>
							</div>
						</div>

						<div class="form-group">
							<label>Service</label>
							<select id="rselect-service" class="select-option" name="services" >

								@foreach($services as $service)
								<option value="{{ $service->id }}">{{ $service->title }}</option>
								@endforeach
							</select>
						</div>
						
						<div class="row">
							<div class="col-xs-12 col-sm-6">
								<div class="form-group">
									<label>Reservation Date</label>
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
										<label>Time picker</label>
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

							


					<button type="submit" class="btn btn-primary">Submit</button>
					</form>
				</div>
				
			</div>
			
			
			
			
		</div>
	</section>
@endsection