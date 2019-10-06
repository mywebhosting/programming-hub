@extends('AdminView/include/menu')
@push('token')
<meta name="csrf-token" content="{{ csrf_token() }}">
@endpush
@section('content')

<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">{{ $extra_page_prev_data[0]['page_title'] }}</h1>
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
                        Edit page
                    </div>
                    <div class="panel-body">
                        <form action="{{ $extra_page_prev_data[0]['page_title'] }}/update" method="POST">
                            {{ csrf_field() }}
                            <input type="hidden" name="page_id" value="{{$extra_page_prev_data[0]['id']}}">
                            <input type="hidden" name="page_title" value="{{$extra_page_prev_data[0]['page_title']}}">
                            <div class="panel-group" id="accordion">
                                <textarea id="chapter_defination" name="page_content" class="editior">{{$extra_page_prev_data[0]['page_content']}}</textarea><br />
                                <button id="edit_page_content" type="submit" class="btn btn-success">Edit Details</button>
                            </div>
                        </form>
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
    <script src="{{ URL::asset('assets/customjs/admin/extrapage.js') }}"></script>

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