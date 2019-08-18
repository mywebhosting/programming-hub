<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

		  <link rel="icon" href="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQfim1fXYIqyXQ5r_kJxmX3s3ajCfFXZU844PopI21Sc9DO4uS9" type="image/gif" sizes="16x16">

        <title>Programming Hub Admin|Dash Board</title>

        <!-- Bootstrap Core CSS -->
        <link href="{{ URL::asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">

        <!-- MetisMenu CSS -->
        <link href="{{ URL::asset('assets/css/metisMenu.min.css') }}" rel="stylesheet">

        <!-- Timeline CSS -->
        <link href="{{ URL::asset('assets/css/timeline.css') }}" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="{{ URL::asset('assets/css/startmin.css') }}" rel="stylesheet">

        <!-- Morris Charts CSS -->
        <link href="{{ URL::asset('assets/css/morris.css') }}" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="{{ URL::asset('') }}assets/css/font-awesome.min.css" rel="stylesheet" type="text/css">

        <link href="{{ URL::asset('') }}assets/css/custom.css" rel="stylesheet" type="text/css">
        @stack('token')

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>

        <div id="wrapper">

            <!-- Navigation -->
            @yield('menu')

            @yield('content')
            <!-- /#page-wrapper -->

        </div>
        <!-- /#wrapper -->

        <!-- jQuery -->
        <script src="{{ URL::asset('assets/js/jquery.min.js') }}"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="{{ URL::asset('assets/js/bootstrap.min.js') }}"></script>

        <!-- Metis Menu Plugin JavaScript -->
        <script src="{{ URL::asset('assets/js/metisMenu.min.js') }}"></script>

        <!-- Custom Theme JavaScript -->
        <script src="{{ URL::asset('assets/js/startmin.js') }}"></script>

        @stack('extra_plagin')

    </body>
</html>
