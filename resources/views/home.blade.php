@extends('layouts.frontend.main')

@section('content')

<section class="carousel slide" id="banner" data-ride="carousel" data-pause="false">
		<div class="carousel-inner">
			@foreach($sliders as $slider)
			<div class="carousel-item @if($loop->first) active @endif" style="background-image:url({{ asset('storage/slider/'.$slider->image) }})">
				<div class="banner-caption">
					<div class="container">
						<div class="row">
							<div class="col-md-7">
								<div class="hero-text">
									<h6 class="animated fadeInDown">{{ $slider->sub_title }}</h6>
									<h1 class="animated fadeInUp">{{ $slider->title }}</h1>
									<p class="animated fadeInUp">{{ $slider->body }}</p>
									<a href="{{ route('contact') }}" class="btn btn-primary animated fadeInUp">Contact Us</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			
			
			
			<ol class="carousel-indicators">
				<li data-target="#banner" data-slide-to="0" class="active"></li>
				<li data-target="#banner" data-slide-to="1"></li>
				<li data-target="#banner" data-slide-to="2"></li>
			</ol>
			@endforeach
		</div>
	</section>
	<!-- end banner -->
	
	<section class="section-spacing">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="section-title text-center">
						<h2><span>Our Services</span></h2>
						<p>Our product is fully personalized and well balanced for all age of customers or adults. We maintain the standards by lorem ipsum and certified by dolor set amet.</p>
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
	<!-- end services -->
	
	<section class="section-spacing inverse-bg">
		<div class="container">
			<div class="row">
				<div class="col-sm-12 col-md-6">
					<div class="img-block wow fadeIn">
						<img src="{{ asset('assets/frontend') }}/img/why-choose/1.jpg" alt="">
						{{-- <div class="play-button">
							<a href="https://www.youtube.com/watch?v=I1uaP1XvQLc&ab_channel=INDIGISProduction" data-toggle="modal" data-target="https://www.youtube.com/watch?v=I1uaP1XvQLc&ab_channel=INDIGISProduction"><i class="fa fa-play"></i></a>
						</div> --}}
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
				<div class="col-md-12">
					<div class="section-title text-center">
						<h2><span>Our gallery</span></h2>
						<p>Our product is fully personalized and well balanced for all age of customers or adults. We maintain the standards by lorem ipsum and certified by dolor set amet.</p>
					</div>
				</div>
			</div>
			<div class="row">
				@foreach($galleries as $gallery)
				<div class="col-sm-6 col-md-4">
					<div class="gallery-item wow fadeIn">
						<a href="{{ asset('storage/gallery/'.$gallery->image) }}" class="venobox" data-gall="gallery">
							<img src="{{ asset('storage/gallery/'.$gallery->image) }}" alt="">
							<div class="gallery-caption text-center">
								<i class="fa fa-heart-o"></i>
								
								<h3>{{ $gallery->title }}</h3>
							</div>
						</a>
					</div>
				</div>
				@endforeach
				
			</div>			
		</div>
	</section>
	<!-- end gallery -->
	
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
	
	<section class="section-spacing inverse-bg">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="section-title text-center">
						<h2><span>Meet Our Experts</span></h2>
						<p>Our product is fully personalized and well balanced for all age of customers or adults. We maintain the standards by lorem ipsum and certified by dolor set amet.</p>
					</div>
				</div>
			</div>
			
			<div class="row">
				@foreach($teams as $team)
				<div class="col-sm-6 col-md-6 col-lg-3">
					<div class="team wow fadeIn">
						<div class="thumb">
							<img src="{{ asset('storage/team/'.$team->image) }}" alt="">
						</div>
						<div class="team-info text-center">
							<h3>{{ $team->name }}</h3>
							<h6>{{ $team->title }}</h6>
						</div>
						<div class="team-overlay text-center">
							<h3>{{ $team->name }}</h3>
							<h6>{{ $team->title }}</h6>
							<ul class="social-icons">
								<li><a href="{{ $team->facebook }}" target="_blank"><i class="fa-brands fa-facebook-f"></i></a></li>
								<li><a href="{{ $team->twitter }}" target="_blank"><i class="fa-brands fa-twitter"></i></a></li>
								<li><a href="{{ $team->instragram }}" target="_blank"><i class="fa-brands fa-instagram"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
				@endforeach
				
			</div>
			
			<div class="row">
				<div class="col-md-12 text-center">
					<a href="{{ route('about') }}" class="btn btn-primary">View Our Experts</a>
				</div>
			</div>
		</div>
	</section>
	<!-- end team member -->
	
	<section class="section-spacing">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-md-6">
					<div class="fun-fact-img wow fadeIn">
						<img class="tilt-img" src="{{ asset('assets/frontend') }}/img/fun-facts/1.png" alt="">
					</div>
				</div>
				<div class="col-md-6">
					<div class="row">
						<div class="col-xs-6 col-sm-6 col-md-6 text-center">
							<div class="features-info">
								<span class="counter">800</span>
								<h3>Clients</h3>
							</div>
						</div>
						<div class="col-xs-6 col-sm-6 col-md-6 text-center">
							<div class="features-info">
								<span class="counter">50</span>
								<h3>Therapists</h3>
							</div>
						</div>
						<div class="col-xs-6 col-sm-6 col-md-6 text-center">
							<div class="features-info">
								<span class="counter">35</span>
								<h3>Procedures</h3>
							</div>
						</div>
						<div class="col-xs-6 col-sm-6 col-md-6 text-center">
							<div class="features-info">
								<span class="counter">890</span>
								<h3>Treatments</h3>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- end fun facts -->
	
	<section class="section-spacing inverse-bg">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="section-title text-center">
						<h2><span>Happy Clients</span></h2>
						<p>Our product is fully personalized and well balanced for all age of customers or adults. We maintain the standards by lorem ipsum and certified by dolor set amet.</p>
					</div>
				</div>
			</div>
			
			<div class="owl-carousel testimonial-carousel">

				@foreach($testimonials as $testimonial)
				<div class="testimonial-list">
					<div class="author-comment">
						<div class="quote">
							<i class="fa fa-quote-left"></i>
						</div>
						<p>{{$testimonial->body}}</p>
					</div>
					<div class="author-info">
						<div class="author_thumb">
							<img src="{{ asset('storage/testimonial/'.$testimonial->image) }}" alt="">
						</div>
						<div class="author-meta">
							<span class="author-name">{{$testimonial->name}}</span>
							<span class="designation"><em>{{$testimonial->title}}</em></span>
						</div>
					</div>
				</div>
				@endforeach
			</div>
			
		</div>
	</section>
	<!-- end team testimonials -->

@endsection