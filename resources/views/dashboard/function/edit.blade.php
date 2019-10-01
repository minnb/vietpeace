@extends('dashboard.app')
@section('title', 'Functions')
@section('page_header', 'Edit Function')
@section('stylesheet')  
    <link type="text/css" rel="stylesheet" href="{{ asset('public/dashboard/css/select2.min.css') }}" />
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
    @include('dashboard.layouts.alert')
</div>
<div class="page-content">
    <div class="row">
        <div class="col-xs-12">
            <form class="form-horizontal" role="form" action="{{route('post.dashboard.function.edit',['id'=>fencrypt($id)])}}" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="<?php echo csrf_token() ?>">
            <div class="tabbable">
                <ul class="nav nav-tabs" id="myTab">
                    <li class="active">
                        <a data-toggle="tab" href="#addUser">
                            <i class="red ace-icon fa fa-home bigger-120"></i> Edit Function
                        </a>
                    </li>
                    <li>
                        <a href="{{route('get.dashboard.function.list')}}">
                            <i class="red ace-icon fa fa-plus bigger-120"></i> List Functions
                        </a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div id="addFunction" class="tab-pane fade in active">
                        <div class="form-group">
                            <label class="col-xs-2 control-label no-padding-right" for="form-field-1"> Name </label>
                            <div class="col-xs-10">
                                <input type="text" id="form-field-1" class="col-xs-10 col-sm-5" name="name" required="" value="{{ old('name', isset($data) ? $data['name'] : '') }}" placeholder="" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-xs-2 control-label no-padding-right" for="form-field-1"> Url </label>
                            <div class="col-xs-10">
                                <input type="text" id="form-field-1" class="col-xs-10 col-sm-5" name="url" required="" value="{{ old('url', isset($data) ? $data['url'] : '#') }}" placeholder="" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-xs-2 control-label no-padding-right" for="form-field-1"> Param </label>
                            <div class="col-xs-10">
                                <input type="text" id="form-field-1" class="col-xs-10 col-sm-5" name="param" value="{{ old('param', isset($data) ? $data['param'] : '') }}" placeholder="" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-xs-2 control-label no-padding-right" for="form-field-1"> Parent </label>
                            <div class="col-xs-10">
                                <select name="parent" class="col-xs-10 col-sm-5">
                                    <option value="0">--- root ---</option>
                                    {!! getSelectForm(App\Models\Functions::getParentFunction(), old('parent', isset($data)?$data['parent']:0)) !!}
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-xs-2 control-label no-padding-right" for="form-field-1"> Sort </label>
                            <div class="col-xs-10">
                                <input type="number" id="form-field-1" class="col-xs-10 col-sm-5" name="sort" required="" value="{{ old('sort', isset($data)?$data['sort']:0) }}" style="text-align: center;" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-xs-2 control-label no-padding-right" for="form-field-1"> Class CSS </label>
                            <div class="col-xs-10">
                                <input type="text" id="form-field-1" class="col-xs-10 col-sm-5" name="classCss" value="{{ old('classCss', isset($data)?$data['class']:'') }}" placeholder="" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-xs-2 control-label no-padding-right" for="form-field-1"> Status </label>
                            <div class="col-xs-10">
                                <select name="status" class="col-xs-10 col-sm-5">
                                    {!! selectedOption(getArrayStatus(), old('status', $data['blocked'])) !!}
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="clearfix form-actions">
                <div class="col-md-offset-2 col-md-9">
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
    </div>
</div>
@endsection
@section("javascript")  
<script src="<?php echo asset('public/dashboard/plugin/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js'); ?>"></script>
<script src="{{asset('public/dashboard/js/select2.min.js') }}"></script>
<script src="{{asset('public/dashboard/js/jquery-ui.custom.min.js') }}"></script>
<script src="{{asset('public/dashboard/js/jquery.ui.touch-punch.min.js') }}"></script>
<script src="{{asset('public/dashboard/js/bootbox.js') }}"></script>
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
    $('.select2').css('width','500px').select2({allowClear:true})
        $('#select2-multiple-style .btn').on('click', function(e){
            var target = $(this).find('input[type=radio]');
            var which = parseInt(target.val());
            if(which == 2) $('.select2').addClass('tag-input-style');
             else $('.select2').removeClass('tag-input-style');
    });
    $(document).one('ajaxloadstart.page', function(e) {
        $('[class*=select2]').remove();
        $('select[name="duallistbox_demo1[]"]').bootstrapDualListbox('destroy');
        $('.rating').raty('destroy');
        $('.multiselect').multiselect('destroy');
    });
</script>
@endsection