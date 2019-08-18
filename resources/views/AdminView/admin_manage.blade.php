@extends('AdminView/include/menu')
@section('content')

<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Admin List</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
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
                        Admin Permission List
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
                                        <th>D.O.J</th>
                                        <th>Email Id</th>
                                        <th>Phone No.</th>
                                        <th>Permission</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        foreach($admin as $key => $value)
                                        {
                                    ?>
                                            <tr>
                                                <td>{{ $value->admin_id }}</td>
                                                <td>{{ $value->first_name }} {{ $value->last_name }}</td>
                                                <td>{{ $value->created_at }}</td>
                                                <td>{{ $value->login_id }}</td>
                                                <td>1236547890</td>
                                                <td>
                                                    <div class="form-group">
                                                        <select class="form-control">
                                                            <option>1</option>
                                                            <option>2</option>
                                                        </select>
                                                    </div>
                                                </td>
                                                <td>
                                                    <button type="button" class="btn btn-success btn-circle" onclick="return active_admin('{{ $value->admin_id }}');"><i class="fa fa-check"></i></button>
                                                    <button type="button" class="btn btn-danger btn-circle" onclick="return deactive_admin('{{ $value->admin_id }}');"><i class="fa fa-times"></i></button>
                                                </td>
                                            </tr>
                                    <?php
                                        }
                                    ?>                                    
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

<!-- Page-Level Demo Scripts - Tables - Use for reference -->
<script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
                responsive: true
        });
    });
</script>
@endpush
