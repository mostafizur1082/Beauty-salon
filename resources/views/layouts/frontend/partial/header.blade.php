<nav class="navbar navbar-expand-lg bg-white">
	<div class="container">
		<a class="navbar-brand" href="{{ route('home') }}">
			<img src="{{ asset('assets/frontend') }}/img/logo.png" alt="Logo">
		</a>
		<button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#main-nav" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="main-nav">
			<ul class="navbar-nav ml-auto">
					<li class="nav-item active">
						
					<a class="nav-link" href="{{ route('home') }}">Home</a>	</li>
					<li class="nav-item">
					<a class="nav-link" href="{{ route('about') }}">About Us</a>			</li>
					<li class="nav-item">
					<a class="nav-link" href="{{ route('services') }}">Services</a></li>
					<li class="nav-item">
					<a class="nav-link" href="{{ route('pricing') }}">Pricing</a>	
					</li>
								
					<li class="nav-item">
					<a class="nav-link" href="{{ route("blogs") }}">Blog</a></li>
					<li class="nav-item">
					<a class="nav-link" href="{{ route('contact') }}">Contact Us</a></li>
					@guest
					@else
					<a class="nav-link" href="{{ url('chatify') }}">Chat</a></li>
					@endguest
					@guest
                	<li class="nav-item">
                		<a class="nav-link" href="{{ route('login') }}">Sign In</a>
                	</li>
            		@else
                	@if(Auth::user()->role->id == 1)
                	<li class="nav-item">
                		<a class="nav-link" href="{{ route('admin.dashboard') }}">Dashboard</a>
                	</li>
                	@endif
                	@if(Auth::user()->role->id == 2)
                    <li class="nav-item">
                		<a class="nav-link" href="{{ route('receptionist.dashboard') }}">Dashboard</a>
                	</li>
                	@endif
                	@if(Auth::user()->role->id == 3)
                	<li class="nav-item">
                		<a class="nav-link" href="{{ route('user.dashboard') }}">Dashboard</a>
                	</li>
                    @endif
            		@endguest

								
				    </li>
					<li class="nav-item btn-appointment">
					<a class="nav-link" href="{{ route('appointment.index') }}">Appointment</a>					
				    </li>

				</ul>
		</div>
	</div>
</nav>