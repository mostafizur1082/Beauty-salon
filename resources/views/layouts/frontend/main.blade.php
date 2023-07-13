<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Amella beauty palace</title>
	<link rel="shortcut icon" href="{{ asset('assets/frontend') }}/img/favicon.png" type="image/x-icon">
    <!-- Bootstrap Core CSS -->
    <link href="{{ asset('assets/frontend') }}/css/bootstrap.min.css" rel="stylesheet">
    <!-- Animate CSS -->
	<link href="{{ asset('assets/frontend') }}/css/animate.css" rel="stylesheet">
    <!-- Venobox CSS -->
	<link href="{{ asset('assets/frontend') }}/css/venobox.css" rel="stylesheet">
	<!-- Owl Carousel CSS -->
	<link href="{{ asset('assets/frontend') }}/css/owl.carousel.min.css" rel="stylesheet">
	<!--Chosen-->
	<link href="{{ asset('assets/frontend') }}/css/chosen.css" rel="stylesheet">
	<!--Time picker-->
	<link href="{{ asset('assets/frontend') }}/css/bootstrap-timepicker.min.css" rel="stylesheet">
	<!--Date picker-->
	<link href="{{ asset('assets/frontend') }}/css/datepicker.css" rel="stylesheet">
	<!-- Font-awesome -->
	{{-- <link rel="stylesheet" href="{{ asset('assets/frontend') }}/fonts/font-awesome/css/font-awesome.min.css"> --}}
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<!-- Google font-->
	<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,400i,500,600,700,800,900" rel="stylesheet">
	
	<!-- Main CSS -->
	<link href="{{ asset('assets/frontend') }}/style.css" rel="stylesheet">

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <style type="text/css">
        .panel-title {
        display: inline;
        font-weight: bold;
        }
        .display-table {
            display: table;
        }
        .display-tr {
            display: table-row;
        }
        .display-td {
            display: table-cell;
            vertical-align: middle;
            width: 61%;
        }
    </style>
	 @stack('css')
	
</head>

<body>
	<!--Preload-->
	{{-- <div class="preloader">
		<div class="preloader_image">
			<div class="sk-double-bounce">
				<div class="sk-child sk-double-bounce1"></div>
				<div class="sk-child sk-double-bounce2"></div>
			</div>
		</div>
	</div> --}}
	
	@include('layouts.frontend.partial.header')
	<!-- end nav -->
	
	@yield('content')
	
	@include('layouts.frontend.partial.footer')
	<!-- end footer -->
	
	<!-- Bact to top -->
	<div class="back-top">
		<a href="#"><i class="fa fa-angle-up"></i></a>
	</div>
	
	<!-- Start Video Modal -->
	<div class="modal fade modal-vcenter" id="video-modal" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="fa fa-times-circle-o"></i></button>
                </div>
                <div class="modal-body">
					<iframe width="760" height="500" src="https://www.youtube.com/embed/EEnkifmw25U?rel=0&amp;showinfo=0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div> 
	<!-- End Video Modal --> 
	
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
	
    <!-- jQuery -->
    <script src="{{ asset('assets/frontend') }}/js/jquery-3.3.1.min.js"></script>
	<script src="{{ asset('assets/frontend') }}/js/popper.min.js"></script>
    <script src="{{ asset('assets/frontend') }}/js/bootstrap.min.js"></script>
    <script src="{{ asset('assets/frontend') }}/js/jquery.counterup.min.js"></script>
    <script src="{{ asset('assets/frontend') }}/js/waypoints.min.js"></script>
    <script src="{{ asset('assets/frontend') }}/js/jquery.easing.min.js"></script>
	<script src="{{ asset('assets/frontend') }}/js/wow.js"></script>
	<script src="{{ asset('assets/frontend') }}/js/owl.carousel.min.js"></script>
	<script src="{{ asset('assets/frontend') }}/js/venobox.min.js"></script>
	<script src="{{ asset('assets/frontend') }}/js/SmoothScroll.js"></script>
	<script src="{{ asset('assets/frontend') }}/js/tilt.jquery.js"></script>
	<script src="{{ asset('assets/frontend') }}/js/bootstrap-timepicker.min.js"></script>
	<script src="{{ asset('assets/frontend') }}/js/bootstrap-datepicker.js"></script>
	<script src="{{ asset('assets/frontend') }}/js/chosen.jquery.js"></script>
	<script src="{{ asset('assets/frontend') }}/mail/js/form-validator.min.js"></script>
	<script src="{{ asset('assets/frontend') }}/mail/js/contact-form-script.js"></script>
    <script src="{{ asset('assets/frontend') }}/js/script.js"></script>
    <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
  
<script type="text/javascript">
$(function() {
   
    var $form = $(".require-validation");
   
    $('form.require-validation').bind('submit', function(e) {
        var $form     = $(".require-validation"),
        inputSelector = ['input[type=email]', 'input[type=password]',
                         'input[type=text]', 'input[type=file]',
                         'textarea'].join(', '),
        $inputs       = $form.find('.required').find(inputSelector),
        $errorMessage = $form.find('div.error'),
        valid         = true;
        $errorMessage.addClass('hide');
  
        $('.has-error').removeClass('has-error');
        $inputs.each(function(i, el) {
          var $input = $(el);
          if ($input.val() === '') {
            $input.parent().addClass('has-error');
            $errorMessage.removeClass('hide');
            e.preventDefault();
          }
        });
   
        if (!$form.data('cc-on-file')) {
          e.preventDefault();
          Stripe.setPublishableKey($form.data('stripe-publishable-key'));
          Stripe.createToken({
            number: $('.card-number').val(),
            cvc: $('.card-cvc').val(),
            exp_month: $('.card-expiry-month').val(),
            exp_year: $('.card-expiry-year').val()
          }, stripeResponseHandler);
        }
  
  });
  
  function stripeResponseHandler(status, response) {
        if (response.error) {
            $('.error')
                .removeClass('hide')
                .find('.alert')
                .text(response.error.message);
        } else {
            /* token contains id, last4, and card type */
            var token = response['id'];
               
            $form.find('input[type=text]').empty();
            $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
            $form.get(0).submit();
        }
    }
   
});
</script>
	 @stack('js')
</body>


</html>