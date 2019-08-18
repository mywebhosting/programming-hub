<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Startmin - Bootstrap Admin Theme</title>

        <!-- Bootstrap Core CSS -->
        <link href="{{ URL::asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">

        <!-- MetisMenu CSS -->
        <link href="{{ URL::asset('assets/css/metisMenu.min.css') }}" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="{{ URL::asset('assets/css/startmin.css') }}" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="{{ URL::asset('assets/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>

        <div class="container">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <div class="login-panel panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Welcome Admin</h3>
                        </div>
                        <div class="panel-body">
                            <form id="login_form" role="form">
                                {{ csrf_field() }}
                                <fieldset>
                                    <div id="show_error" class="alert alert-danger alert-dismissible">
                                        Show error
                                    </div>
                                    <div class="form-group">
                                        <input id="email" class="form-control" placeholder="E-mail" name="email" type="email" autocomplete="none">
                                    </div>
                                    <div class="form-group">
                                        <input id="pwd" class="form-control" placeholder="Password" name="password" type="password">
                                    </div>
                                    <!--<div class="checkbox">
                                        <label>
                                            <input name="remember" type="checkbox" value="Remember Me">Remember Me
                                        </label>
                                    </div>-->
                                    <!-- Change this to a button or input when using this as a form -->
                                    <img id="login_loader" src="assets/loader/loader.gif" style="width: 50px; display: none;">
                                    <a href="javascript:void(0);" id="login_bttn" class="btn btn-lg btn-success btn-block" disable>Login</a>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- jQuery -->
        <script src="{{ URL::asset('assets/js/jquery.min.js') }}"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="{{ URL::asset('assets/js/bootstrap.min.js') }}"></script>

        <!-- Metis Menu Plugin JavaScript -->
        <script src="{{ URL::asset('assets/js/metisMenu.min.js') }}"></script>

        <!-- Custom Theme JavaScript -->
        <script src="{{ URL::asset('assets/js/startmin.js') }}"></script>

        <script src="{{ URL::asset('assets/js/jquery.md5.min.js') }}"></script>

        <script src="{{ URL::asset('assets/customjs/admin/login.js') }}"></script>

    </body>
</html>
