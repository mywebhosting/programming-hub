@extends('UserView/include/main_templact')

@push('extra_css')
	<!-- Push this css -->
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('userview/asset/css/custom/learning_details.css') }}">
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
						<span>{{ $lang_title }}</span>
						<hr />
					</div>
				</div>
				<div class="row">
					<div class="col-md-12 details_area">
						<div class="accordion" id="accordionExample">
							@foreach($language_chapter_detl as $key => $value)
								@if($key == 0)
									<div class="card custom_card">
										<div class="card-header heading_style" id="headingOne">
											<h2 class="mb-0">
												<button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse{{$key}}" aria-expanded="true" aria-controls="collapse{{$key}}">{{$value->chapter_title}}</button>
											</h2>
										</div>

										<div id="collapse{{$key}}" class="collapse show" aria-labelledby="heading{{$key}}" data-parent="#accordionExample">
											<div class="card-body card_detils">
											<?php echo $value->chapter_describe; ?>
											</div>
										</div>
									</div>
								@else
									<div class="card custom_card">
										<div class="card-header heading_style" id="headingTwo">
											<h2 class="mb-0">
												<button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">{{$value->chapter_title}}</button>
											</h2>
										</div>
										<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
											<div class="card-body card_detils">
											<?php echo $value->chapter_describe; ?>
											</div>
										</div>
									</div>
								@endif
							@endforeach
							<!-- <div class="card custom_card">
								<div class="card-header heading_style" id="headingTwo">
									<h2 class="mb-0">
										<button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">Print Hello world</button>
									</h2>
								</div>
								<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
									<div class="card-body card_detils">
									Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.
									</div>
								</div>
							</div> -->
							<!-- <div class="card custom_card">
								<div class="card-header heading_style" id="headingThree">
									<h2 class="mb-0">
										<button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseTwo">Print Hello world</button>
									</h2>
								</div>
								<div id="collapseThree" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
									<div class="card-body card_detils">
									Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.
									</div>
								</div>
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