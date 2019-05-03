@extends('dashboard.app')
@section('title', 'Categories')
@section('page_header', 'Add Category')
@section('stylesheet')  
    <link rel="stylesheet" href="#" />
@endsection
@section('content')
<div class="page-content">
    <div class="page-header">
        <h1>
            @yield('title')
            <small>
                <i class="ace-icon fa fa-angle-right"></i>
                @yield('page_header')
            </small>
        </h1>
    </div>
</div>
@include('dashboard.layouts.alert')
<div class="page-content">
    <div class="row">
        <div class="col-xs-12">
            <div class="tabbable">
                <ul class="nav nav-tabs" id="myTab">
                    <li class="active">
                        <a data-toggle="tab" href="#add">
                            <i class="red ace-icon fa fa-plus bigger-120"></i> Add {{$name}}
                        </a>
                    </li>
                    <li>
                        <a href="{{route('get.dashboard.category.list',['name'=>makeUnicode($name)])}}">
                            <i class="green ace-icon fa fa-list bigger-120"></i> List {{$name}}
                        </a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div id="add" class="tab-pane fade in active">
                       <form class="form-horizontal" role="form" action="{{route('post.dashboard.category.add', ['name'=>makeUnicode($name)])}}" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="<?php echo csrf_token() ?>">
                            <div class="form-group">
                                <label class="col-xs-2 control-label no-padding-right" for="form-field-1"> {{Illuminate\Support\Str::studly($name)}}  </label>
                                <div class="col-xs-4">
                                    <select class="chosen-select form-control" id="form-field-select-3" name="parent" required="">
                                        {!! menuMulti(App\Models\Category::getMultiCategory($parent),0,"--",0) !!}
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-xs-2 control-label no-padding-right" for="form-field-1"> {{Illuminate\Support\Str::studly($name)}} name </label>
                                <div class="col-xs-9">
                                    <input type="text" id="form-field-1" placeholder="Category name" class="col-xs-9 col-sm-5" name="name" required="" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-xs-2 control-label no-padding-right" for="form-field-1"> Description </label>
                                <div class="col-xs-9">
                                    <textarea name="description" id="description" rows="6" class="col-xs-9 col-sm-5"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-xs-2 control-label no-padding-right" for="form-field-1"> Content </label>
                                <div class="col-xs-9">
                                    <textarea name="content" id="content" rows="6" class="col-xs-9 col-sm-5">{{ old('content')}}</textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-xs-2 control-label no-padding-right" for="form-field-1"> Sort </label>
                                <div class="col-xs-9">
                                    <input type="number" name="sort" placeholder="0" class="col-xs-9 col-sm-5" value="0" style="text-align: center;" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-xs-2 control-label no-padding-right">Status</label>
                                <div class="col-xs-9">
                                    <input name="status" class="ace ace-switch ace-switch-4 btn-rotate" type="checkbox" checked="true" />
                                    <span class="lbl"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-xs-2 control-label no-padding-right">Image</label>
                                <div class="col-xs-4">
                                    <label class="ace-file-input">
                                        <input type="file" id="id-input-file-2" name="fileImage[]">
                                    </label>
                                </div>
                            </div>  
                            <div class="clearfix form-actions">
                                <div class="col-md-offset-3 col-md-9">
                                    <button class="btn btn-info" type="Submit">
                                        <i class="ace-icon fa fa-check bigger-110"></i>
                                        Submit
                                    </button>
                                    &nbsp; &nbsp; &nbsp;
                                    <a class="btn" href="#">
                                        <i class="ace-icon fa fa-undo bigger-110"></i>
                                        Reset
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div id="list" class="tab-pane fade"></div>
                </div>
            </div>
        </div><!-- /.col -->
    </div>
</div>
@endsection
@section("javascript")  
<script src="<?php echo asset('public/dashboard/plugin/func_ckfinder.js'); ?>"></script>
<script src="<?php echo asset('public/dashboard/plugin/ckeditor/ckeditor.js'); ?>"></script>
<script src="<?php echo asset('public/dashboard/plugin/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js'); ?>"></script>
<script type="text/javascript">
    jQuery(document).ready(function(){
        $('#id-input-file-1 , #id-input-file-2').ace_file_input({
            no_file:'No File ...',
            btn_choose:'Choose',
            btn_change:'Change',
            droppable:false,
            onchange:null,
            thumbnail:false //| true | large
            //whitelist:'gif|png|jpg|jpeg'
            //blacklist:'exe|php'
            //onchange:''
            //
        });
    });
        $(document).ready(function(){
        ckeditor('description')
        $('.textarea').wysihtml5();
      });
    $(document).ready(function(){
        ckeditor('content')
        $('.textarea').wysihtml5();
      });
</script>
@endsection