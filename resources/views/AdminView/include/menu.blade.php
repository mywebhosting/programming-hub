@extends('AdminView/include/header')
@section('menu')
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
	<div class="navbar-header">
		<a class="navbar-brand" href="index.html">Programming Hub</a>
	</div>

	<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
		<span class="sr-only">Toggle navigation</span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
	</button>

	<ul class="nav navbar-nav navbar-left navbar-top-links">
		<li><a href="#"><i class="fa fa-home fa-fw"></i> Go To Website</a></li>
	</ul>

	<ul class="nav navbar-left navbar-top-links">
		<li><a href="#"><i class="fa fa-clock-o fa-fw"></i> <span class="digital-clock"></span></a></li>
	</ul>

	<ul class="nav navbar-right navbar-top-links">
		<li class="dropdown navbar-inverse">
			<a class="dropdown-toggle" data-toggle="dropdown" href="#">
					<i class="fa fa-bell fa-fw"></i> <b class="caret"></b>
			</a>
			<ul class="dropdown-menu dropdown-alerts">
				<li>
					<a href="#">
						<div>
							<i class="fa fa-comment fa-fw"></i> New Contact
							<span class="pull-right text-muted small">4 minutes ago</span>
						</div>
					</a>
				</li>
				<li>
					<a href="#">
						<div>
							<i class="fa fa-twitter fa-fw"></i> 3 New Followers
							<span class="pull-right text-muted small">12 minutes ago</span>
						</div>
					</a>
				</li>
				<li>
					<a href="#">
						<div>
							<i class="fa fa-envelope fa-fw"></i> Message Sent
							<span class="pull-right text-muted small">4 minutes ago</span>
						</div>
					</a>
				</li>
				<li>
					<a href="#">
						<div>
							<i class="fa fa-tasks fa-fw"></i> New Task
							<span class="pull-right text-muted small">4 minutes ago</span>
						</div>
					</a>
				</li>
				<li>
					<a href="#">
						<div>
							<i class="fa fa-upload fa-fw"></i> Server Rebooted
							<span class="pull-right text-muted small">4 minutes ago</span>
						</div>
					</a>
				</li>
				<li class="divider"></li>
				<li>
					<a class="text-center" href="#">
						<strong>See All Alerts</strong>
						<i class="fa fa-angle-right"></i>
					</a>
				</li>
			</ul>
		</li>
			<li class="dropdown">
					<a class="dropdown-toggle" data-toggle="dropdown" href="#">
							<i class="fa fa-user fa-fw"></i> {{ session('admin_name') }} <b class="caret"></b>
					</a>
					<ul class="dropdown-menu dropdown-user">
							<li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
							</li>
							<li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
							</li>
							<li class="divider"></li>
							<li><a href="login.html"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
							</li>
					</ul>
			</li>
	</ul>
	<!-- /.navbar-top-links -->

	<div class="navbar-default sidebar" role="navigation">
		<div class="sidebar-nav navbar-collapse">
			<ul class="nav" id="side-menu">
				<!-- <li class="sidebar-search">
					<div class="input-group custom-search-form">
					<input type="text" class="form-control" placeholder="Search...">
					<span class="input-group-btn">
						<button class="btn btn-primary" type="button">
							<i class="fa fa-search"></i>
						</button>
					</span>
					</div>
				</li> -->
				<li>
					<a href="{{ url('super-admin/dashboard') }}"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a> <!--  class="active" -->
				</li>
				<li>
					<a href="{{ url('super-admin/language') }}"><i class="fa fa-book fa-fw"></i> Languages</a>
				</li>
				<li>
					<a href="{{ url('super-admin/project') }}"><i class="fa fa-terminal fa-fw"></i> Projects</a>
				</li>
				<li>
					<a href="#"><i class="fa fa-wrench fa-fw"></i> Web Site Management<span class="fa arrow"></span></a>
					<ul class="nav nav-second-level">
						<li>
							<a href="{{ URL('super-admin/management/website-settings') }}">Website Basic Settings</a>
						</li>
						<li>
							<a href="{{ URL('super-admin/management/website-extra-page') }}">Website Extra Pages</a>
						</li>
						<li>
							<a href="#">Banner</a>
						</li>
					</ul>
					<!-- /.nav-second-level -->
				</li>
				<li>
					<a href="#"><i class="fa fa-book fa-fw"></i> Image Repository</a>
				</li>
				<!-- <li>
					<a href="#"><i class="fa fa-sitemap fa-fw"></i> Multi-Level Dropdown<span class="fa arrow"></span></a>
					<ul class="nav nav-second-level">
						<li>
								<a href="#">Second Level Item</a>
						</li>
						<li>
								<a href="#">Second Level Item</a>
						</li>
						<li>
							<a href="#">Third Level <span class="fa arrow"></span></a>
							<ul class="nav nav-third-level">
								<li>
									<a href="#">Third Level Item</a>
								</li>
								<li>
									<a href="#">Third Level Item</a>
								</li>
								<li>
									<a href="#">Third Level Item</a>
								</li>
								<li>
									<a href="#">Third Level Item</a>
								</li>
							</ul> -->
							<!-- /.nav-third-level -->
						<!-- </li>
					</ul> -->
					<!-- /.nav-second-level -->
				<!-- </li> -->
				<li>
					<a href="#"><i class="fa fa-files-o fa-fw"></i>User Management<span class="fa arrow"></span></a>
					<ul class="nav nav-second-level">
						<li>
							<a href="blank.html">Add Admin</a>
						</li>
						<li>
							<a href="{{ url('super-admin/admin-permission') }}">Admin Permission</a>
						</li>
						<li>
							<a href="client_manage.html">Client User</a>
						</li>
					</ul>
					<!-- /.nav-second-level -->
				</li>
			</ul>
		</div>
	</div>
</nav>
@endsection

@push('extra_plagin')
<script>
    $(document).ready(function() {
	  clockUpdate();
	  setInterval(clockUpdate, 1000);
	})

	function clockUpdate() {
	  var date = new Date();
	  // $('.digital-clock').css({'color': '#fff', 'text-shadow': '0 0 6px #ff0'});
	  function addZero(x) {
	    if (x < 10) {
	      return x = '0' + x;
	    } else {
	      return x;
	    }
	  }

	  function twelveHour(x) {
	    if (x > 12) {
	      return x = x - 12;
	    } else if (x == 0) {
	      return x = 12;
	    } else {
	      return x;
	    }
	  }

	  var h = addZero(twelveHour(date.getHours()));
	  var m = addZero(date.getMinutes());
	  var s = addZero(date.getSeconds());

	  $('.digital-clock').text(h + ':' + m + ':' + s)
	}
    </script>
    @endpush