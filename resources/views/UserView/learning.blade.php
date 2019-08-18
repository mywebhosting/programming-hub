@extends('UserView/include/main_templact')

@push('extra_css')
	<!-- Push this css -->
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('userview/asset/css/custom/learning.css') }}">
@endpush

@section('content')

<!-- -------------------------------	Learning	-------------------------------------- -->
<section class="aboutme">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8">
				<div class="row">
					<div class="col-md-12 title_area">
						<span>Learning</span>
						<hr />
					</div>
				</div>
				<div class="row">
					<div class="col-md-12 details_area">
						<div class="row">
							@foreach($language_detl as $key => $value)
								<div class="col-md-4 space">
									<a href="{{ $value->seo_slug }}" class="language_a">
										<div class="language">
											<div class="language_title">{{ $value->title }}</div>
										</div>
									</a>
								</div>
							@endforeach
							<!-- <div class="col-md-4 space">
								<a href="" class="language_a">
									<div class="language">
										<div class="language_title">C</div>
									</div>
								</a>
							</div>
							<div class="col-md-4 space">
								<a href="" class="language_a">
									<div class="language">
										<div class="language_title">C#</div>
									</div>
								</a>
							</div>
							<div class="col-md-4 space">
								<a href="" class="language_a">
									<div class="language">
										<div class="language_title">PHP</div>
									</div>
								</a>
							</div> -->
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-2"></div>
		</div>
	</div>
</section>
<!-- -------------------------------	learning End	---------------------------------- -->
@endsection