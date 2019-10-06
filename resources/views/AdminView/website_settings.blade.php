@extends('AdminView/include/menu')
@push('token')
<meta name="csrf-token" content="{{ csrf_token() }}">
@endpush
@section('content')

<style type="text/css">
    .site_logo
    {
        width: 100px;
        height: 100px;
        border: 1px solid black;
    }
    i
    {
        cursor: pointer;
    }
</style>

<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Website Basic settings</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12 message">
                <div id="success_div" class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <span id="success_msg">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</span> <a href="javascript:void(0)" class="alert-link">Alert Link</a>.
                </div>
                <div id="error_div" class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <span id="error_msg">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</span> <a href="javascript:void(0)" class="alert-link">Alert Link</a>.
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                @if(session('status'))
                    <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <span>{{ session('status') }}</span> <a href="javascript:void(0)" class="alert-link">Success</a>.
                    </div>
                @endif
            </div>
            <!-- /.col-lg-6 -->
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Site Basic Settings
                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <form action="website-settings/basic-settings" method="POST" enctype="multipart/form-data" id="basic_settings_form" role="form">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <label>Site Title</label>
                                                <input id="site_title" name="site_title" class="form-control" value="{{ $prev_data[0]['site_title'] }}">
                                                <p class="help-block">This name will append with the page name</p>
                                            </div>
                                            <div class="col-lg-6">
                                                <label>Site Logo</label>
                                                <input type="file" id="site_logo" name="site_logo" onchange="show_logo(this);" class="form-control">
                                                <p class="help-block"></p>
                                            </div>
                                            <div class="col-lg-6">
                                                <label>Site Logo Preview</label>
                                                <br />
                                                <img id="logo_prev" src="{{ URL($prev_data[0]['site_logo_path']) }}" class="site_logo">
                                                <p class="help-block"></p>
                                            </div>
                                            <div class="col-lg-12">
                                                <button type="submit" class="btn btn-outline btn-success">Update</button>
                                            </div>
                                            <div class="col-lg-12">
                                                <img id="basic_settings_loader" src="{{URL::asset('assets/loader/loader.gif')}}" width="50px;">
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <!-- /.table-responsive -->
                            </div>
                            <!-- /.panel-body -->
                        </div>
                        <!-- /.panel -->
                    </div>
                    <!-- /.col-lg-6 -->
                </div>
                <!-- /.row -->
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Site Social Settings
                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <form action="website-settings/social-settings" method="POST" role="form">
                                    {{ csrf_field() }}
                                    <?php
                                        $encode_link = $prev_data[0]['social_link'];
                                        $links = json_decode($encode_link);
                                    ?>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <label>Facebook Link</label>
                                                <input id="fb_link" name="fb_link" class="form-control" value="{{ $links->facebook }}">
                                                <p class="help-block"></p>
                                            </div>
                                            <div class="col-lg-6">
                                                <label>LinkedIn Link</label>
                                                <input id="linkin_link" name="linkin_link" class="form-control" value="{{ $links->linkedin }}">
                                                <p class="help-block"></p>
                                            </div>
                                            <div class="col-lg-6">
                                                <label>What's app number</label>
                                                <input id="wa_link" name="wa_link" class="form-control" value="{{ $links->whatsapp }}">
                                                <p class="help-block"></p>
                                            </div>
                                            <div class="col-lg-12">
                                                <button type="submit" class="btn btn-outline btn-success">Update</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <!-- /.table-responsive -->
                            </div>
                            <!-- /.panel-body -->
                        </div>
                        <!-- /.panel -->
                    </div>
                    <!-- /.col-lg-6 -->
                </div>
                <!-- /.row -->
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Contact details
                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <form action="website-settings/contact-settings" method="POST"  role="form">
                                    {{ csrf_field() }}
                                    <?php
                                        $encode_email = $prev_data[0]['email'];
                                        $encode_phone = $prev_data[0]['phone_no'];
                                        $address = $prev_data[0]['address'];
                                        $emails = json_decode($encode_email);
                                        $ph_no = json_decode($encode_phone);
                                    ?>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <label>Contact Email(s)</label>
                                                <div class="row">
                                                    @foreach ($emails as $key => $value)
                                                        @if($value != "")
                                                            <div class="col-lg-11">
                                                                <input id="conct_email" name="conct_email[]" class="form-control" value="{{ $value }}" placeholder="Contact Email">
                                                                <p class="help-block"></p>
                                                            </div>
                                                        @endif
                                                    @endforeach
                                                    <div class="col-lg-11">
                                                        <input id="conct_email" name="conct_email[]" class="form-control" value="{{ old( 'language_title' ) }}" placeholder="Contact Email">
                                                        <p class="help-block"></p>
                                                    </div>
                                                    <div id="cont_email_ext"></div>
                                                    <div class="col-lg-1">
                                                        <i class="fa fa-plus" aria-hidden="true" onclick="return extra_email();"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <label>Contact Phone No(s)</label>
                                                <div class="row">
                                                    @foreach ($ph_no as $key => $value)
                                                        @if($value != "")
                                                            <div class="col-lg-11">
                                                                <input id="conct_phno" name="conct_phno[]" class="form-control" value="{{ $value }}" placeholder="Contact phone no.">
                                                                <p class="help-block"></p>
                                                            </div>
                                                        @endif
                                                    @endforeach
                                                    <div class="col-lg-11">
                                                        <input id="conct_phno" name="conct_phno[]" class="form-control" value="{{ old( 'language_title' ) }}" placeholder="Contact phone no.">
                                                        <p class="help-block"></p>
                                                    </div>
                                                    <div id="cont_phone_extra"></div>
                                                    <div class="col-lg-1">
                                                        <i class="fa fa-plus" aria-hidden="true" onclick="return extra_phone();"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <label>Address</label>
                                                <div class="row">
                                                    <div class="col-lg-11">
                                                        <textarea name="address" class="form-control">{{$address}}</textarea>
                                                        <p class="help-block"></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <button type="submit" class="btn btn-outline btn-success">Update</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <!-- /.table-responsive -->
                            </div>
                            <!-- /.panel-body -->
                        </div>
                        <!-- /.panel -->
                    </div>
                    <!-- /.col-lg-6 -->
                </div>
                <!-- /.row -->
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->

    @endsection

@push('extra_plagin')
<!-- DataTables JavaScript -->
    <script src="{{ URL::asset('assets/js/dataTables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/dataTables/dataTables.bootstrap.min.js') }}"></script>
    <script src="{{ URL::asset('assets/customjs/admin/website_settings.js') }}"></script>

    <!-- Custom Theme JavaScript -->
    <script src="{{ URL::asset('assets/js/startmin.js') }}"></script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
        $(document).ready(function() {
            $('#dataTables-example').DataTable({
                responsive: true
            });
        });
    </script>
@endpush