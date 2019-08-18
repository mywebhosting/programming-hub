@extends('AdminView/include/menu')
@section('content')

<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Projects</h1>
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
                                Create New Project Packge
                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <form role="form">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <label>Project Title</label>
                                                <input class="form-control">
                                                <p class="help-block">Example block-level help text here.</p>
                                            </div>
                                            <div class="col-lg-12">
                                                <button type="button" class="btn btn-outline btn-success">Create Project</button>
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
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. <a href="#" class="alert-link">Alert Link</a>.
                </div>
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. <a href="#" class="alert-link">Alert Link</a>.
                </div>
            </div>
            <!-- /.col-lg-6 -->
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Existing Language
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
                                        <th>Serial No.</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Mark</td>
                                        <td>@mdo</td>
                                        <td>
                                            <input class="form-control" type="number">
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-success btn-circle"><i class="fa fa-check"></i></button>
                                            <button type="button" class="btn btn-warning btn-circle"><i class="fa fa-edit "></i></button>
                                            <button type="button" class="btn btn-danger btn-circle"><i class="fa fa-times"></i></button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Jacob</td>
                                        <td>@mdo</td>
                                        <td>
                                            <div class="form-group"><input class="form-control" type="number"></div>
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-success btn-circle"><i class="fa fa-check"></i></button>
                                            <button type="button" class="btn btn-warning btn-circle"><i class="fa fa-edit "></i></button>
                                            <button type="button" class="btn btn-danger btn-circle"><i class="fa fa-times"></i></button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Larry</td>
                                        <td>@mdo</td>
                                        <td><input class="form-control" type="number"></td>
                                        <td>
                                            <button type="button" class="btn btn-success btn-circle"><i class="fa fa-check"></i></button>
                                            <button type="button" class="btn btn-warning btn-circle"><i class="fa fa-edit "></i></button>
                                            <button type="button" class="btn btn-danger btn-circle"><i class="fa fa-times"></i></button>
                                        </td>
                                    </tr>
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
</div>
<!-- /#page-wrapper -->
@endsection

@push('extra_plagin')
<!-- DataTables JavaScript -->
    <script src="{{ URL::asset('assets/js/dataTables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/dataTables/dataTables.bootstrap.min.js') }}"></script>

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