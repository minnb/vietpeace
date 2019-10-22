@extends('dashboard.app')
@section('title', 'Categories')
@section('page_header', 'Edit Category')
@section('stylesheet')  
   
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
                            <i class="red ace-icon fa fa-plus bigger-120"></i> Edit {{$name}}
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
                       <form class="form-horizontal" role="form" action="{{route('post.dashboard.category.edit', ['name'=>makeUnicode($name), 'id'=>fencrypt($id)])}}" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="<?php echo csrf_token() ?>">
                            <div class="form-group">
                                <label class="col-xs-2 control-label no-padding-right" for="form-field-1"> {{Illuminate\Support\Str::studly($name)}} </label>
                                <div class="col-xs-4">
                                    <select class="chosen-select form-control" id="form-field-select-3" name="parent" required="">
                                        {!! menuMulti(App\Models\Category::getMultiCategory($parent), 0 ,"---", old('parent', asset($data) ? $data['parent'] : 0)) !!}
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-xs-2 control-label no-padding-right" for="form-field-1"> Category name </label>
                                <div class="col-xs-9">
                                    <input type="text" id="form-field-1" placeholder="Category name" class="col-xs-9 col-sm-5" name="name" value="{{old('name', asset($data) ? $data['name'] : 0)}}" required="" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-xs-2 control-label no-padding-right" for="form-field-1"> Description </label>
                                <div class="col-xs-9">
                                    <textarea name="description" id="description" rows="6" class="col-xs-9 col-sm-5">{{old('description', asset($data) ? $data['description'] : 0)}}</textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-xs-2 control-label no-padding-right" for="form-field-1"> Content </label>
                                <div class="col-xs-9">
                                    <textarea name="content" id="content" rows="6" class="col-xs-9 col-sm-5">{{old('description', asset($data) ? $data['content'] : 0)}}</textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-xs-2 control-label no-padding-right" for="form-field-1"> Sort </label>
                                <div class="col-xs-9">
                                    <input type="number" name="sort" placeholder="0" class="col-xs-9 col-sm-5" value="{{old('sort', asset($data) ? $data['sort'] : 0)}}" style="text-align: center;" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-xs-2 control-label no-padding-right">Status</label>
                                <div class="col-xs-9">
                                    @if($data['status'] == 1)
                                        <input name="status" class="ace ace-switch ace-switch-4 btn-rotate" type="checkbox" checked="true" />
                                    @else
                                        <input name="status" class="ace ace-switch ace-switch-4 btn-rotate" type="checkbox" />
                                    @endif
                                    <span class="lbl"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-xs-2 control-label no-padding-right">Image <span class="size_image">(1400x470)</span></label>
                                <div class="col-xs-4">
                                    <label class="ace-file-input">
                                        <input type="file" id="id-input-file-2" name="fileImage[]">
                                    </label>
                                </div>
                            </div>  
                            @if($data['image'] != '')
                            <div class="form-group">
                                <label class="col-xs-2 control-label no-padding-right" for="form-field-1"></label>
                                <div class="col-xs-9">
                                    <img src="{{asset($data['image'])}}" style="max-height: 100px">
                                </div>
                            </div>
                            @endif
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