@extends('layouts.frontend.main')

@section('content')

	<section class="inner-page-banner" style="background-image:url({{ asset('assets/frontend') }}/img/banner/about-banner.jpg)">
		<div class="page-banner-caption">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<h1>About Us</h1>
						<ol class="breadcrumb" style="background-color: #ffffff;">
							<li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
							<li class="breadcrumb-item active">About us</li>
						</ol>
					</div>
				</div>
			</div>
		</div>
	</section>
	
	<section class="section-spacing">
		<div class="container">
			<div class="row">
				<div class="col-sm-12 col-md-6">
					<div class="img-block wow fadeIn">
						<img src="{{ asset('assets/frontend') }}/img/team/our-story.jpg" alt="">
						<div class="play-button">
							<a href="#" data-toggle="modal" data-target="#video-modal"><i class="fa fa-play"></i></a>
						</div>
					</div>
				</div>
				<div class="col-sm-12 col-md-6">
					<div class="text-block wow fadeIn">
						<h2>Our history</h2>
						<p>Our product is fully personalized and well balanced for all age of customers or adults. We maintain the standards by lorem ipsum and certified by dolor set amet.</p>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi fermentum justo vitae convallis varius. Nulla tristique risus ut justo pulvinar mattis.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi fermentum justo vitae convallis varius. Nulla tristique risus ut justo pulvinar mattis.</p>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- end our history -->
	
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
					<a href="{{ route('contact') }}" class="btn btn-primary">Contat Us</a>
				</div>
			</div>
		</div>
	</section>
	<!-- end team member -->
	
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

@endsection