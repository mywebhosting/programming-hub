@extends('UserView/include/main_templact')

@push('extra_css')
	<!-- Push this css -->
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('userview/asset/css/custom/log_reg.css') }}">
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
						<span>Log In / Registration</span>
						<hr />
					</div>
				</div>
				<div class="row">
					<div class="col-md-12 details_area">
						<div class="row">
							<!-- ===============	login 	==================== -->
							<div class="col-md-6">
								<div class="login">
									<div class="log_content">
										<div class="row">
											<div class="col-md-12">
												<div class="log_title"><span>Login</span></div>
											</div>
										</div>
										<form>
											<div class="row">
												<div class="col-md-12">
													<label class="error">All fields are mentetory</label>
												</div>
											</div>
											<div class="row">
												<div class="col-md-12">
													<input type="text" name="" placeholder="Email">
												</div>
											</div>
											<div class="row">
												<div class="col-md-12">
													<input type="password" name="" class="pwd" placeholder="Password">
													<i class="fas fa-eye-slash"></i>
													<i class="fas fa-eye"></i>
												</div>
											</div>
											<div class="row">
												<div class="col-md-12">
													<button type="submit">Login</button>
												</div>
											</div>
										</form>
									</div>
								</div>
								<div class="social_login">
									<div class="social_log_content">
										<div class="row">
											<div class="col-md-6">
												<button class="facebook"><i class="fab fa-facebook-f"></i>Continue with facebook</button>
											</div>
											<div class="col-md-6">
												<button class="gmail"><img src="https://img.icons8.com/color/48/000000/google-logo.png">Continue with google</button>
											</div>
										</div>
										<div class="row">
											<div class="col-md-6">
												<button class="twitter"><img src="https://img.icons8.com/color/48/000000/twitter.png">Continue with twitter</button>
											</div>
											<div class="col-md-6">
												<button class="spotify"><img src="https://img.icons8.com/color/48/000000/spotify--v2.png">Continue with spotify</button>
											</div>
										</div>
									</div>
								</div>
							</div>
							<!-- ===============	login End 	================ -->
							<!-- ===================	Registration 	========================= -->
							<div class="col-md-6">
								<div class="reg">
									<div class="reg_content">
										<div class="row">
											<div class="col-md-12">
												<div class="reg_title"><span>Registration</span></div>
											</div>
										</div>
										<form>
											<div class="row">
												<div class="col-md-12">
													<label class="error">All fields are mentetory</label>
												</div>
											</div>
											<div class="row">
												<div class="col-md-6">
													<input type="text" name="" placeholder="First name">
												</div>
												<div class="col-md-6">
													<input type="text" name="" placeholder="Last name">
												</div>
											</div>
											<div class="row">
												<div class="col-md-12">
													<input type="text" name="" placeholder="Email">
												</div>
											</div>
											<div class="row">
												<div class="col-md-6">
													<select>
														<option>--Select Gender--</option>
														<option>Male</option>
														<option>Female</option>
														<option>Other</option>
													</select>
												</div>
												<div class="col-md-6">
													<input type="date" name="" pattern="">
												</div>
											</div>
											<div class="row">
												<div class="col-md-6">
													<input type="password" name="" class="pwd" placeholder="Password">
													<i class="fas fa-eye-slash"></i>
													<i class="fas fa-eye"></i>
												</div>
												<div class="col-md-6">
													<input type="password" name="" class="pwd" placeholder="Confirm password">
												</div>
											</div>
											<div class="row">
												<div class="col-md-12">
													Google BOT or Recaptcha will display here
												</div>
												<div class="col-md-12 turms_condition">
													<input type="checkbox" name="">Read all documents and I accept turms and conditions.
												</div>
											</div>
											<div class="row">
												<div class="col-md-12">
													<button type="submit">Registration</button>
												</div>
											</div>
										</form>
									</div>
								</div>
							</div>
							<!-- ===================	Registration End	===================== -->
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