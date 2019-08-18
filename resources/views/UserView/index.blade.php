@extends('UserView/include/main_templact')

@section('content')
<!-- -------------------------------	Popup	------------------------------------------ -->
<section id="popup_sec">
	<style type="text/css">
		#popup
		{
			width: 100%;
			min-height: 620px;
			background-color: #797676ba;
			z-index: 3;
	    	position: absolute;
	    	position: fixed;
	    	top: 0;
	    	padding-top: 50px;
		}

		.msg
		{
			background-color: #131513d9;
			padding: 20px;
			margin: 20px;
			position: relative;
		}
		.msg:before
		{
			content: "X";
			background-color: #ffffff;
			color: black;
			font-size: 20px;
			padding: 2px 10px;
			border-radius: 30px;
			position: absolute;
			z-index: 50;
			right: -10px;
			top: -10px;
			cursor: pointer;
		}
	</style>
	<section id="popup">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-2"></div>
				<div class="col-md-8 msg">
					<center><h3>Warning</h3></center>
					<p>This site is under development. Many function will not working. </p>
					<p>This is request from site owner, please don't forcefully click or don't get angry if any function not work. And don't pay any amount on this site. This site not need any kind of money for sell any projects</p>
					<p>Thank you for visit my site.</p>
				</div>
				<div class="col-md-2"></div>
			</div>
		</div>
	</section>
	<script type="text/javascript">
		$("#popup_sec").click(function(){
			$("#popup_sec").fadeOut(500);
			$("#popup_sec").remove();
		});
	</script>
</section>
<!-- -------------------------------	Popup	------------------------------------------ -->

<!-- -------------------------------	Banner	------------------------------------------ -->
<section class="banner">
	<div class="container-fluid">
		<div class="col-md-12">
			<div id="wowslider-container1">
			<div class="ws_images"><ul>
					<li><img src="{{ URL::asset('userview/asset/slider/data1/images/2018langsbanner.jpg') }}" alt="2018langsbanner" title="Easy Under standing" style="background-size: cover;" id="wows1_0"/></li>
					<li><img src="{{ URL::asset('userview/asset/slider/data1/images/untitled2.jpg') }}" alt="Untitled-2" title="Simpler and small implementation" style="background-size: cover;" id="wows1_1"/></li>
					<li><img src="{{ URL::asset('userview/asset/slider/data1/images/untitled3.jpg') }}" alt="slider jquery" title="Online compile" style="background-size: cover;" id="wows1_2"/></li>
					<li><img src="{{ URL::asset('userview/asset/slider/data1/images/untitled1.jpg') }}" alt="Untitled-1" title="Online project buy" style="background-size: cover;" id="wows1_3"/></li>
				</ul></div>
				<div class="ws_bullets"><div>
					<a href="#" title="2018langsbanner"><span><img src="{{ URL::asset('userview/asset/slider/data1/tooltips/2018langsbanner.jpg') }}" alt="2018langsbanner"/>1</span></a>
					<a href="#" title="Untitled-2"><span><img src="{{ URL::asset('userview/asset/slider/data1/tooltips/untitled2.jpg') }}" alt="Untitled-2"/>2</span></a>
					<a href="#" title="Untitled-3"><span><img src="{{ URL::asset('userview/asset/slider/data1/tooltips/untitled3.jpg') }}" alt="Untitled-3"/>3</span></a>
					<a href="#" title="Untitled-1"><span><img src="{{ URL::asset('userview/asset/slider/data1/tooltips/untitled1.jpg') }}" alt="Untitled-1"/>4</span></a>
				</div></div>
			</div>	
			<script type="text/javascript" src="{{ URL::asset('userview/asset/slider/engine1/wowslider.js') }}"></script>
			<script type="text/javascript" src="{{ URL::asset('userview/asset/slider/engine1/script.js') }}"></script>
<!-- End WOWSlider.com BODY section -->
		</div>
	</div>
</section>
<!-- -------------------------------	Banner End	-------------------------------------- -->

<!-- --------------------------------	Language	-------------------------------------- -->
<section id="language" style="width: 100%; height: 200px; position: absolute; /* background-color: red; */ /* z-index: 2; */ top: 460px;"></section>
<section class="prog_language">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12 title_area">
				<span>Programming language</span>
				<hr />
			</div>
		</div>
	</div>
	<div class="container-fluid">
		<div class="row language_content">
			<div class="col-md-3"></div>
			<div class="col-md-6">
				<div class="row">
					@foreach($language_detl as $key => $value)
					<div class="col-md-4 col-sm-4 language_tab" onclick="window.location.href='language/{{ $value->seo_slug }}'">
						<div class="language_tab_content">{{ $value->title }}</div>
					</div>
					@endforeach
					<!-- <div class="col-md-4 col-sm-4 language_tab">
						<div class="language_tab_content">C++</div>
					</div>
					<div class="col-md-4 col-sm-4 language_tab">
						<div class="language_tab_content">Java</div>
					</div>
					<div class="col-md-4 col-sm-4 language_tab">
						<div class="language_tab_content">PHP with JS</div>
					</div>
					<div class="col-md-4 col-sm-4 language_tab">
						<div class="language_tab_content">Python</div>
					</div> -->
					<div class="col-md-4 col-sm-4 language_tab">
						<div class="more_language_tab_content" onclick="window.location.href='language/more'">More Language <span>&#10513;</span></div>
					</div>
				</div>
			</div>
			<div class="col-md-3"></div>
		</div>
	</div>
</section>
<!-- --------------------------------	Language End	---------------------------------- -->

<!-- --------------------------------	Project	------------------------------------------ -->

<section id="project" style="width: 100%; height: 200px; position: absolute;  /*background-color: red;*/  /* z-index: 2; */ top: 800px;"></section>
<section class="project">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12 title_area">
				<span>Projects</span>
				<hr />
			</div>
		</div>
	</div>
	<div class="container-fluid">
		<div class="row project_content">
			<div class="col-md-3"></div>
			<div class="col-md-6">
				<div class="row">
					<div class="col-md-6 col-sm-6">
						<div class="single_project" onclick="window.location='google.com'">
							<span class="project_name">Online Photo Gallary System using PHP and MySQL</span>
						</div>
					</div>
					<div class="col-md-6 col-sm-6">
						<div class="single_project" onclick="window.location='google.com'">
							<span class="project_name">Online Photo Gallary System using PHP and MySQL</span>
						</div>
					</div>
					<div class="col-md-6 col-sm-6">
						<div class="single_project" onclick="window.location='google.com'">
							<span class="project_name">Online Photo Gallary System using PHP and MySQL</span>
						</div>
					</div>
					<div class="col-md-6 col-sm-6">
						<div class="single_project" onclick="window.location='google.com'">
							<span class="more_project_name">More Projects&#10513;</span>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-3"></div>
		</div>
	</div>
</section>
<!-- --------------------------------	project End	-------------------------------------- -->
@endsection