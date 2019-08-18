@extends('AdminView/include/menu')
@push('token')
<meta name="csrf-token" content="{{ csrf_token() }}">
@endpush
@section('content')

<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">{{ $language['title'] }}</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div id="chapter_success" class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <span id="success_text">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</span>
                </div>
                <div id="chapter_error" class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. <!-- <a href="#" class="alert-link">Alert Link</a>. -->
                </div>
                @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Error Ocured, when adding chapters.<br /><a href="javascript:void(0)" class="alert-link">Error Message: </a>{{ $errors->all()[0] }}<br />Chapter cration unsuccessfull<!-- <a href="#" class="alert-link">Alert Link</a>. -->
                    </div>                    
                @endif
                @if(session('status'))
                    <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><a href="javascript:void(0)" class="alert-link">Success </a>{{ session('status') }}
                    </div>
                @endif
            </div>
            <!-- /.col-lg-6 -->
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Existing Language Chapter(s)
                    </div>
                    <!-- /.panel-heading -->

                    <!-- <div class="panel-body">
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
                    </div> -->
                    <div class="panel-body">
                        <?php /*print_r($chapter); */ $i = 0; ?>
                        @foreach($chapter as $key => $value)
                                <?php $i++; ?>
                        <div class="panel-group" id="accordion">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse{{ $key }}"><span id="show_chapter_name_{{$i}}">{{ $value['chapter_title'] }}</span></a>
                                    </h4>
                                </div>
                                <div id="collapse{{ $key }}" class="panel-collapse collapse">   <!-- class="panel-collapse collapse in -->
                                    <div class="panel-body">                                                    
                                        <div class="row" id="chapter_handel_{{$i}}">
                                            <div class="col-lg-2">
                                                <button type="button" class="btn btn-success" onclick="return edit_chapter_name('{{$i}}');">Edit Chapter name</button>
                                            </div>
                                            <div class="col-lg-2">
                                                <button type="button" class="btn btn-danger">Delete Chapter</button>
                                            </div>
                                            <div class="col-lg-2">
                                                @if($value['active_status'] == 1)
                                                    <button type="button" class="btn btn-danger">Deactive</button>
                                                @else
                                                    <button type="button" class="btn btn-success">Active</button>
                                                @endif
                                            </div>
                                            <?php $chapter_id = $value['chapter_id'] ?>
                                            <div class="col-lg-2">
                                                <input type="number" id="chapter_sl_no_{{$i}}" class="form-control" value="{{ $value['serial_no'] }}" placeholder="Serial no" onchange="return chpater_sl_no('{{$chapter_id}}','{{$i}}')">
                                            </div>
                                        </div>
                                        <!-- Edit chapter name -->
                                        <br />
                                        <div id="edit_chapter_name_{{$i}}" class="row" style="display: none;">
                                            <div class="col-lg-2">
                                                <input type="text" id="edit_chapter_{{$i}}" name="edit_chapter_{{$i}}" class="form-control" value="{{ $value['chapter_title'] }}">
                                            </div>
                                            <div class="col-lg-2">
                                                <?php $chapter_id = $value['chapter_id'] ?>
                                                <button type="button" class="btn btn-info" onclick="return submit_chapter('{{$i}}','{{$chapter_id}}');">Edit Chapter name</button>
                                            </div>
                                            <div class="col-lg-2">
                                                <button type="button" class="btn btn-danger" onclick="return cancel('{{$i}}')">Cancel</button>
                                            </div>
                                        </div>
                                        <!-- /Edit chapter name -->
                                        <br />
                                        <textarea id="chapter_defination_{{$i}}" class="editior">{{ $value['chapter_describe'] }}</textarea><br />
                                        <button type="button" class="btn btn-success" onclick="return edit_chapter('{{$i}}','{{$chapter_id}}');" >Edit Details</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        <?php if($i== 0)echo "<span style='font-weight: 600; text-shadow: 1px 1px 4px black;'>No chapter created yet!</span><br /><br />"; ?>
                        <button type="button" class="btn btn-success" id="create_chapter">Create New Chapter</button>
                        <div id="new_chapter_creation">
                            <form action="{{URL('/super-admin/language/')}}/{{ $language['title'] }}/creating" method="POST" onsubmit="return chcek_all();">
                                {{ csrf_field() }}
                                <div class="panel-group" id="accordion">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <a data-toggle="collapse" data-parent="#accordion" href="#collapse">Add New Chapter</a>
                                            </h4>
                                        </div>
                                        <div id="collapse" class="panel-collapse collapse in">   <!-- class="panel-collapse collapse in -->
                                            <div class="panel-body">
                                                <input type="hidden" name="language_id" value="{{ $language['language_id'] }}">
                                                <input type="hidden" name="language_title" value="{{ $language['title'] }}">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <input id="chapter_title" type="text" class="form-control" name="chapter_title" placeholder="Chapter Title">
                                                    </div>
                                                    <div class="col-lg-2">
                                                        <input id="sl_no" type="number" class="form-control" name="sl_no" placeholder="Serial no">
                                                    </div>
                                                </div>
                                                <br />
                                                <textarea id="chater_desc" class="editior" name="chater_desc"></textarea><br />
                                                <button type="submit" class="btn btn-success">Create Chapter</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
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
@endsection

@push('extra_plagin')
<!-- DataTables JavaScript -->
    <script src="{{ URL::asset('assets/js/dataTables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/dataTables/dataTables.bootstrap.min.js') }}"></script>
    <script src="{{ URL::asset('assets/customjs/admin/language.js') }}"></script>

    <!-- Custom Theme JavaScript -->
    <script src="{{ URL::asset('assets/js/startmin.js') }}"></script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
        $(document).ready(function() {
            $('#dataTables-example').DataTable({
                responsive: true,
                'order': [[ 0, 'desc' ]],
            });
        });
    </script>

    <!-- Tinymce -->
    <script type="text/javascript" src="{{ URL::asset('tinymce/js/tinymce/tinymce.min.js') }}"></script>

    <script type="text/javascript">
        tinymce.init({
            /* replace textarea having class .tinymce with tinymce editor */
            /*selector: "textarea.tinymce",*/
            selector: "textarea.editior",

            setup: function (editor) {
                editor.on('change', function () {
                    editor.save();
                });
            },
            
            /* theme of the editor */
            /*theme: "modern",
            skin: "lightgray",*/
            
            /* width and height of the editor */
            width: "100%",
            height: 300,
            
            /* display statusbar */
            statubar: true,
            
            /* plugin */
            plugins: [
                "advlist autolink link image lists charmap print preview hr anchor pagebreak",
                "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
                "save table contextmenu directionality emoticons template paste textcolor"
            ],

            /* toolbar */
            toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media fullpage | forecolor backcolor emoticons",
            
            /* style */
            /*style_formats: [
                {title: "Headers", items: [
                    {title: "Header 1", format: "h1"},
                    {title: "Header 2", format: "h2"},
                    {title: "Header 3", format: "h3"},
                    {title: "Header 4", format: "h4"},
                    {title: "Header 5", format: "h5"},
                    {title: "Header 6", format: "h6"}
                ]},
                {title: "Inline", items: [
                    {title: "Bold", icon: "bold", format: "bold"},
                    {title: "Italic", icon: "italic", format: "italic"},
                    {title: "Underline", icon: "underline", format: "underline"},
                    {title: "Strikethrough", icon: "strikethrough", format: "strikethrough"},
                    {title: "Superscript", icon: "superscript", format: "superscript"},
                    {title: "Subscript", icon: "subscript", format: "subscript"},
                    {title: "Code", icon: "code", format: "code"}
                ]},
                {title: "Blocks", items: [
                    {title: "Paragraph", format: "p"},
                    {title: "Blockquote", format: "blockquote"},
                    {title: "Div", format: "div"},
                    {title: "Pre", format: "pre"}
                ]},
                {title: "Alignment", items: [
                    {title: "Left", icon: "alignleft", format: "alignleft"},
                    {title: "Center", icon: "aligncenter", format: "aligncenter"},
                    {title: "Right", icon: "alignright", format: "alignright"},
                    {title: "Justify", icon: "alignjustify", format: "alignjustify"}
                ]}
            ]*/
        });
    </script>
    <!-- Tinymce end -->

    <script type="text/javascript" src="{{ URL::asset('assets/customjs/admin/language_chapter.js') }}"></script>
@endpush