@extends('layouts.frontend.main')

@section('content')

	<section class="inner-page-banner" style="background-image:url({{ asset('assets/frontend') }}/img/banner/services-banner.jpg)">
	
		<div class="page-banner-caption">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<h1>Service Details</h1>
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
							<li class="breadcrumb-item active">Service Details</li>
						</ol>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- end banner -->
	
	<section class="section-spacing">
		<div class="container">
			@foreach($service_details as $service)
			<div class="row">
				<div class="col-md-4">
					<div class="service-item wow fadeIn">
						<div class="thumb">
							<img src="{{ asset('storage/service/'.$service->image) }}" alt="">
						</div>
						<div class="service-info text-center">
							<h3><a href="service-single.html">{{ $service->title }}</a></h3>
							<p>{{ $service->short_des }}</p>
							<a href="{{ route('appointment.index') }}" class="btn btn-default">Book Now</a>
						</div>
					</div>
				</div>
				<div class="col-md-8">
					<div class="service-details">
						{{ $service->long_des }}
					</div>
				</div>
			</div>
			@endforeach
		</div>
	</section>
	<!-- end services -->

	<section class="section-spacing">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="section-title text-center">
						<h2><span>May You Also Like</span></h2>
						
					</div>
				</div>
			</div>
			<div class="row">
				@foreach($services as $service)
				<div class="col-md-4">
					<div class="service-item wow fadeIn">
						<div class="thumb">
							<a href="{{ route('service.details',$service->id) }}">
								<img src="{{ asset('storage/service/'.$service->image) }}" alt="{{ $service->title }}">
							</a>
							
						</div>
						<div class="service-info text-center">
							<h3><a href="{{ route('service.details',$service->id) }}">{{ $service->title }}</a></h3>
							<p>{{ $service->short_des }}</p>
							<a href="{{ route('service.details',$service->id) }}" class="btn btn-default">Read More</a>
						</div>
					</div>
				</div>
				@endforeach
			</div>
			
			<div class="row">
				<div class="col-md-12 text-center">
					<a href="{{ route('services') }}" class="btn btn-primary">All Services</a>
				</div>
			</div>
		</div>
	</section>
	
	{{-- <section class="section-spacing inverse-bg">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="section-title text-center">
						<h2><span>You may also like</span></h2>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-4">
					<div class="service-item wow fadeIn">
						<div class="thumb">
							<a href="service-single.html"><img src="img/services/2.jpg" alt=""></a>
						</div>
						<div class="service-info text-center">
							<h3><a href="service-single.html">Stone Message</a></h3>
							<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy.</p>
							<a href="service-single.html" class="btn btn-default">Read More</a>
						</div>
					</div>
				</div>
				
				<div class="col-md-4">
					<div class="service-item wow fadeIn">
						<div class="thumb">
							<a href="service-single.html"><img src="img/services/3.jpg" alt=""></a>
						</div>
						<div class="service-info text-center">
							<h3><a href="service-single.html">Body Message</a></h3>
							<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy.</p>
							<a href="service-single.html" class="btn btn-default">Read More</a>
						</div>
					</div>
				</div>
				
				<div class="col-md-4">
					<div class="service-item wow fadeIn">
						<div class="thumb">
							<a href="service-single.html"><img src="img/services/5.jpg" alt=""></a>
						</div>
						<div class="service-info text-center">
							<h3><a href="service-single.html">Aromatherapy</a></h3>
							<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy.</p>
							<a href="service-single.html" class="btn btn-default">Read More</a>
						</div>
					</div>
				</div>
				
			</div>
			
			<div class="row">
				<div class="col-md-12 text-center">
					<a href="contact-us.html" class="btn btn-primary">Contact us</a>
				</div>
			</div>
		</div>
	</section> --}}
	<!-- end services -->

@endsection