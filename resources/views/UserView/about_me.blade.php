@extends('UserView/include/main_templact')

@push('extra_css')
	<!-- Push this css -->
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('userview/asset/css/custom/about_me.css') }}">
@endpush

@section('content')

<!-- -------------------------------	About Me	-------------------------------------- -->
<section class="aboutme">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8">
				<div class="row">
					<div class="col-md-12 title_area">
						<span>About Me</span>
						<hr />
					</div>
				</div>
				<div class="row">
					<div class="col-md-12 details_area">
						<img src= <?php if($extra_page_detl[0]->page_image_path) echo '"'.$extra_page_detl[0]->page_image_path.'"'; else echo "no_image.png"; ?>>
						<span><?php echo $extra_page_detl[0]->page_content; ?></span>
					</div>
				</div>
			</div>
			<div class="col-md-2"></div>
		</div>
	</div>
</section>
<!-- -------------------------------	About Me End	---------------------------------- -->
@endsection