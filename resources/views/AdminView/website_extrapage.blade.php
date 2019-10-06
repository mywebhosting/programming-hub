@extends('AdminView/include/menu')
@push('token')
<meta name="csrf-token" content="{{ csrf_token() }}">
@endpush
@section('content')

<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Website Extra Pages</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Create New Pages
                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <form method="GET" role="form" id="page_title_form">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <label>Page Title</label>
                                                <input id="page_title" name="page_title" class="form-control">
                                                <p class="help-block">Example block-level help text here. &nbsp;&nbsp; <span class="title_error">@if ($errors->any()) {{ $errors->all()[0] }} @endif</span></p>
                                            </div>
                                            <div class="col-lg-12">
                                                <button type="submit" class="btn btn-outline btn-success">Create</button>
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
                <div id="success_alet" class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <span id="success_msg">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</span> <a href="javascript:void(0)" id="success_alert" class="alert-link">Alert Link</a>.
                </div>
                <div id="error_alert" class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <span id="error_msg">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</span> <a href="javascript:void(0)" id="error_alet" class="alert-link">Alert Link</a>.
                </div>
            </div>
            <!-- /.col-lg-6 -->
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Existing Pages
                    </div>
                    <!-- /.panel-heading -->

                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-8"></div>
                            <div class="col-lg-4">
                                <div class="input-group custom-search-form">
                                    <input type="text" class="form-control" placeholder="Search by programming name">
                                    <span class="input-group-btn">
                                        <button class="btn btn-primary" type="button">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Name</th>
                                        <th>Added By</th>
                                        <th>Action</th>
                                        <th>Last Modify</th>
                                    </tr>
                                </thead>
                                 <tbody>
                                    <?php $i = 0; ?>
                                    @foreach($extra_page_prev_data as $key => $value)
                                        <tr>
                                            <td><?php echo ++$i; ?></td>
                                            <td>{{ $value->page_title }}</td>
                                            <td>{{ $value->login_id }} ({{ $value->first_name}} {{$value->last_name}})</td>
                                            <td>
                                                @if($value->page_status >0)
                                                    <button onclick="return deactive('{{$i}}','{{$value->id}}');" type="button" class="btn btn-success btn-circle" title="Deactive now"><i class="fa fa-check"></i></button>
                                                @else
                                                    <button onclick="return active('{{$i}}','{{$value->id}}');" type="button" class="btn btn-warning btn-circle" title="Active now"><i class="fa fa-exclamation-triangle"></i></button>
                                                @endif
                                                <button onclick="window.location.href='/super-admin/language/{{ $value->title }}'" type="button" class="btn btn-warning btn-circle"><i class="fa fa-edit "></i></button>
                                                <button type="button" class="btn btn-danger btn-circle" onclick="return delete_lang('{{$i}}','{{$value->id}}')"><i class="fa fa-times"></i></button>
                                                <i id="change_loader_{{$i}}" class="fa fa-spinner fa-spin" style="font-size:14px; display: none;"></i>
                                            </td>
                                            <td>{{$value->updated_at}}</td>
                                        </tr>
                                    @endforeach
                                    @if($i == 0)
                                    <tr><td colspan="6">Sorry! No data found</td></tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
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
    <!-- /.container-fluid -->

    @endsection

@push('extra_plagin')
<!-- DataTables JavaScript -->
    <script src="{{ URL::asset('assets/js/dataTables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/dataTables/dataTables.bootstrap.min.js') }}"></script>
    <script src="{{ URL::asset('assets/customjs/admin/extrapage.js') }}"></script>

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