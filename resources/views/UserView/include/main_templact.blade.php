<!DOCTYPE html>
<html>
<head>
	<title>Programming hub</title>
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('userview/asset/css/bootstrap.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('userview/asset/css/custom/index_custom.css') }}">

	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

	<link rel="stylesheet" type="text/css" href="{{ URL::asset('userview/asset/slider/engine1/style.css') }}" />
	@stack('extra_css')
	<script type="text/javascript" src="{{ URL::asset('userview/asset/slider/engine1/jquery.js') }}"></script>
</head>
<body>

<!-- -------------------------------	MENU	------------------------------------------ -->
<section class="top_menu">
	<div class="d-none d-md-block container-fluid">
		<div class="row">
			<div class="col-md-4 ">
				<div class="logo"><img src="{{ URL::asset('userview/asset/image/index.png') }}"></div>
			</div>
			<div class="col-md-8">
				<div class="menu">
					<ul>
						<li><a href="{{ URL('/') }}" <?php if($page == "home") echo 'class="active"'; ?>>Home</a></li>
						<li><a href="#">About Me</a></li>
						<li><a href="{{ URL('/') }}#language" <?php if($page == "language") echo 'class="active"'; ?>>Language</a></li>
						<li><a href="#project">Projects</a></li>
						<li><a href="#contact">Contact Us</a></li>
						<li><a href="{{ URL('/login-registration') }}" <?php if($page == "login") echo 'class="active"'; ?>>Login/Registration</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<!-- -------------------------	Responsive	------------------------------------- -->
	<div class="d-block d-md-none container-fluid">
		<div class="row">
			<div class="col-sm-4 col-4">
				<div class="logo"><img src="{{ URL::asset('userview/asset/image/index.png') }}"></div>
			</div>
			<div class="col-sm-8 col-8">
				<div class="menu">
					<i class="fas fa-bars menu_show" onclick="return show_menu();"></i>
					<i class="fas fa-times menu_close" onclick="return hide_menu();" style="display: none;"></i>
				</div>
			</div>
			<div class="resp_menu">
				<ul>
					<li><a href="#" class="active">Home</a></li>
					<li><a href="#">About Me</a></li>
					<li><a href="#">Learning</a></li>
					<li><a href="#project">Projects</a></li>
					<li><a href="#contact">Contact Us</a></li>
					<li><a href="#">Login/Registration</a></li>
				</ul>
			</div>
		</div>
	</div>
	<!-- -------------------------	Responsive End	--------------------------------- -->
</section>
<!-- -------------------------------	MENU End	-------------------------------------- -->
<section class="gap"></section>

@yield('content')

<!-- --------------------------------	Contact	------------------------------------------ -->
<section id="contact" class="contact">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12 title_area">
				<span>Contact With Us</span>
				<hr />
			</div>
		</div>
	</div>
	<?php 
		$address = $contact_details[0]->address;
		$ph_no_encode = $contact_details[0]->phone_no;
		$ph_no = json_decode($ph_no_encode);
		$email_encode = $contact_details[0]->email;
		$email = json_decode($email_encode);
	?>
	<div class="container-fluid">
		<div class="row project_content">
			<div class="d-sm-none d-md-block col-md-2"></div>
			<div class="col-md-4 col-sm-6">
				<div class="address_detls">
					<i class="fas fa-map-marker-alt"></i>
					<span class="address">{{$address}}</span>
				</div>
				<div class="address_detls">
					<i class="fas fa-mobile-alt"></i>
					<span class="ph_no">
						<?php $i=0; ?>
						@foreach($ph_no as $key => $value)
							@if($value != "" && $i > 0)
								{{ '/'.$value}}
							@else
								{{$value}}
							@endif
							<?php $i++; ?>
						@endforeach
					</span>
				</div>
				<div class="address_detls">
					<i class="fas fa-envelope"></i>
					<span class="email">
						<?php $i=0; ?>
						@foreach($email as $key => $value)
							@if($value != "" && $i > 0)
								{{ '/'.$value}}
							@else
								{{$value}}
							@endif
							<?php $i++; ?>
						@endforeach
					</span>
				</div>
			</div>
			<div class="col-md-4 col-sm-6">
				<div class="contact_form">
					<form>
						<label class="imp">Name</label>
						<input type="text" name="name" placeholder="Name:">
						<label class="imp">Email Id</label>
						<input type="text" name="name" placeholder="Email:">
						<label>Subject</label>
						<input type="text" name="name" placeholder="Subject:">
						<label class="imp">Message</label>
						<textarea name="message" placeholder="Message"></textarea>

						<input type="submit" name="send_message" value="Send Email">
					</form>
				</div>
			</div>
			<div class="d-sm-none d-md-block col-md-2"></div>
		</div>
	</div>
</section>
<!-- --------------------------------	contact End	-------------------------------------- -->

<!-- --------------------------------	Footer	------------------------------------------ -->
<footer>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-6 col-sm-6 foot_text">&copy; 2019 Subhajit Dey. All rights reserved.</div>
			<div class="d-sm-none d-md-block col-md-3"></div>
			<div class="col-md-3 col-sm-6">
				<div class="social_links">
					<?php
						$social_encode = $contact_details[0]->social_link;
						$social = json_decode($social_encode);
					?>
					<a href="{{$social->facebook}}" target="_tab"><i class="fab fa-facebook-f facebook"></i></a>
					<a href="{{$social->linkedin}}" target="_tab"><i class="fab fa-linkedin-in linkedin"></i></a>
					<a href=""><i class="fab fa-whatsapp wa"></i></a>
				</div>
			</div>
		</div>
	</div>
</footer>
<!-- --------------------------------	Footer End	-------------------------------------- -->

<script type="text/javascript" src="{{ URL::asset('userview/asset/js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('userview/asset/js/jquery-3.3.1.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('userview/asset/js/custom/index_custom.js') }}"></script>
</body>
</html>