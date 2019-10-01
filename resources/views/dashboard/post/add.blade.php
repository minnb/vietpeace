@extends('dashboard.app')
@section('title', 'Tour')
@section('page_header', 'Add Tour')
@section('stylesheet')  
    <link type="text/css" rel="stylesheet" href="{{ asset('dashboard/css/select2.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard/plugin/jquery.filer/css/jquery.filer.css') }}"/>
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
            <form class="form-horizontal" role="form" action="{{route('post.dashboard.post.add')}}" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="<?php echo csrf_token() ?>">
            <div class="tabbable">
                <ul class="nav nav-tabs" id="myTab">
                    <li class="active">
                        <a data-toggle="tab" href="#brief">
                            <i class="red ace-icon fa fa-home bigger-120"></i> BRIEF
                        </a>
                    </li>
                    <li>
                        <a data-toggle="tab" href="#full">
                            <i class="ace-icon fa fa-globe bigger-120"></i> FULL ITINERARY
                        </a>
                    </li>
                    <li>
                        <a data-toggle="tab" href="#trip">
                            <i class="ace-icon fa fa-fighter-jet bigger-120"></i> TRIP FAQ
                        </a>
                    </li>
                    <li>
                        <a data-toggle="tab" href="#hotel">
                            <i class="ace-icon fa fa-bell bigger-120"></i> HOTELS
                        </a>
                    </li>
                    <li>
                        <a data-toggle="tab" href="#guide">
                            <i class="ace-icon fa fa-book bigger-120"></i> GUIDE & TRANSPORT
                        </a>
                    </li>
                    <li>
                        <a data-toggle="tab" href="#meal">
                            <i class="ace-icon fa fa-cutlery bigger-120"></i> MEALS
                        </a>
                    </li>
                    <li>
                        <a data-toggle="tab" href="#gallery">
                            <i class="ace-icon fa fa-camera bigger-120"></i> GALLERY
                        </a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div id="brief" class="tab-pane fade in active">
                        <div class="form-group">
                            <label class="col-xs-1 control-label no-padding-right" for="form-field-1"> Category </label>
                            <div class="col-xs-10">
                                <select multiple="" id="cate_id" name="cate_id[]" class="select2" data-placeholder="Click to Choose...">
                                    {!! getSelectArrayForm(App\Models\Category::getSelect2Category(), [0]) !!}
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-xs-1 control-label no-padding-right" for="form-field-1"> Tour name </label>
                            <div class="col-xs-10">
                                <input type="text" id="form-field-1" placeholder="Tour name" class="col-xs-10 col-sm-5" name="name" required="" value="{{ old('name') }}" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-xs-1 control-label no-padding-right">Days</label>
                            <div class="col-xs-3">
                                <input type="number" id="form-field-2" class="col-xs-10 col-sm-5" name="day_number" required="" value="{{ old('day_number',0) }}" style="text-align: right" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-xs-1 control-label no-padding-right">Unit Price ($)</label>
                            <div class="col-xs-3">
                                <input type="number" id="form-field-3" class="col-xs-10 col-sm-5" name="unit_price" required="" value="{{ old('unit_price',0) }}" style="text-align: right" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-xs-1 control-label no-padding-right">Status</label>
                            <div class="col-xs-3">
                                <input name="status" class="ace ace-switch ace-switch-4 btn-rotate" type="checkbox" checked="true" />
                                <span class="lbl"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-xs-1 control-label no-padding-right" for="form-field-1"> Tags </label>
                            <div class="col-xs-10">
                                <textarea type="text" id="form-field-4" placeholder="#destination #tour" class="col-xs-10 col-sm-5" name="tags">{{ old('tags')}}</textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-xs-1 control-label no-padding-right">Image</label>
                            <div class="col-xs-4">
                                <label class="ace-file-input">
                                    <input type="file" id="id-input-file-2" name="fileImage[]">
                                </label>
                            </div>
                        </div>  
                        <div class="form-group">
                            <label class="col-xs-1 control-label no-padding-right" for="form-field-1"> Description </label>
                            <div class="col-xs-10">
                                <textarea name="description" id="description"  rows="6" class="col-xs-10 col-sm-5">{{ old('description')}}</textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-xs-1 control-label no-padding-right" for="form-field-1"> Content </label>
                            <div class="col-xs-10">
                                <textarea name="content" id="content" rows="6" class="col-xs-10 col-sm-5">{{ old('content')}}</textarea>
                            </div>
                        </div>
                    </div>
                    <div id="full" class="tab-pane fade">
                        <div class="form-group">
                            <div class="col-xs-12">
                                <textarea name="content_full" id="content_full" rows="10" class="col-xs-10 col-sm-5">{{ old('content_full')}}</textarea>
                            </div>
                        </div>
                    </div>
                    <div id="trip" class="tab-pane fade">
                        <div class="form-group">
                            <div class="col-xs-12">
                                <textarea name="content_trip" id="content_trip_faq" rows="10" class="col-xs-10 col-sm-5">{{ old('content_trip_faq')}}</textarea>
                            </div>
                        </div>
                    </div>
                    <div id="hotel" class="tab-pane fade">
                        <div class="form-group">
                            <div class="col-xs-12">
                                <textarea name="content_hotel" id="content_hotel" rows="10" class="col-xs-10 col-sm-5">{{ old('content_hotel')}}</textarea>
                            </div>
                        </div>
                    </div>
                    <div id="guide" class="tab-pane fade">
                        <div class="form-group">
                            <div class="col-xs-12">
                                <textarea name="content_guide" id="content_guide" rows="10" class="col-xs-10 col-sm-5">{{ old('content_guide')}}</textarea>
                            </div>
                        </div>
                    </div>
                    <div id="meal" class="tab-pane fade">
                        <div class="form-group">
                            <div class="col-xs-12">
                                <textarea name="content_meal" id="content_meal" rows="10" class="col-xs-10 col-sm-5">{{ old('content_meal')}}</textarea>
                            </div>
                        </div>
                    </div>
                    <div id="gallery" class="tab-pane fade">
                        <div class="form-group">
                            <div class="col-xs-12">
                                <input class="form-control" type="file" name="galleryImage[]" id="filer_image_gallery" multiple="multiple">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="clearfix form-actions">
                <div class="col-md-offset-1 col-md-9">
                    <button class="btn btn-info" type="Submit">
                        <i class="ace-icon fa fa-check bigger-110"></i>
                        Submit
                    </button>
                    &nbsp; &nbsp; &nbsp;
                    <a class="btn" href="#">
                        <i class="ace-icon fa fa-undo bigger-110"></i>
                        Reset
                    </a>
                    &nbsp; &nbsp; &nbsp;
                    <a class="btn btn-success" href="{{route('get.dashboard.post.list')}}">
                        <i class="ace-icon fa fa-list bigger-120"></i> List Tours
                    </a>
                </div>
            </div>
            </form>
        </div><!-- /.col -->
    </div>
</div>
@endsection
@section("javascript")  
<script src="<?php echo asset('dashboard/plugin/func_ckfinder.js'); ?>"></script>
<script src="<?php echo asset('dashboard/plugin/ckeditor/ckeditor.js'); ?>"></script>
<script src="<?php echo asset('dashboard/plugin/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js'); ?>"></script>
<script src="{{asset('dashboard/js/select2.min.js') }}"></script>
<script src="{{asset('dashboard/js/jquery-ui.custom.min.js') }}"></script>
<script src="{{asset('dashboard/js/jquery.ui.touch-punch.min.js') }}"></script>
<script src="{{asset('dashboard/js/bootbox.js') }}"></script>
<script src="{{asset('dashboard/js/bootstrap-multiselect.min.js') }}"></script>
<script src="{{asset('dashboard/plugin/jquery.filer/js/jquery.filer.min.js') }}"></script>
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
    $(document).ready(function(){
        ckeditor('content_full')
        $('.textarea').wysihtml5();
      });
    $(document).ready(function(){
        ckeditor('content_trip_faq')
        $('.textarea').wysihtml5();
      });
    $(document).ready(function(){
        ckeditor('content_hotel')
        $('.textarea').wysihtml5();
      });
    $(document).ready(function(){
        ckeditor('content_meal')
        $('.textarea').wysihtml5();
      });
    $(document).ready(function(){
        ckeditor('content_guide')
        $('.textarea').wysihtml5();
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
<script type="text/javascript">
    jQuery(document).ready(function(){
        'use-strict';
        $('#filer_image_gallery').filer({
            limit: 3,
            maxSize: 3,
            extensions: ['jpg', 'jpeg', 'png', 'gif', 'psd'],
            changeInput: true,
            showThumbs: true,
            addMore: true
        });
    });
</script>
@endsection