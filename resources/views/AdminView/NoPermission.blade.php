@extends('AdminView/include/menu')
@section('content')
<div id="page-wrapper">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">No permission</h1>
			</div>
			<!-- /.col-lg-12 -->
		</div>
		<div class="row">
			<div class="col-lg-12 col-md-12">
				<div class="panel panel-info">
					<div class="panel-heading">
						<div class="row">
							<div class="col-xs-12">
								<i class="fa fa-frown-o fa-5x"></i>
							</div>
							<div class="col-xs-12 text-right">
								<div class="huge">You have No Permission</div>
								<div>To access this page</div>
							</div>
						</div>
					</div>
					<a href="#">
						<div class="panel-footer">
							<span class="pull-left">Click Here To Request For Access</span>
							<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

							<div class="clearfix"></div>
						</div>
					</a>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

@push('extra_plagin')
<!-- Morris Charts JavaScript -->
<script src="{{ URL::asset('assets/js/raphael.min.js') }}"></script>
<script src="{{ URL::asset('assets/js/morris.min.js') }}"></script>
<script src="{{ URL::asset('assets/js/morris-data.js') }}"></script>
@endpush