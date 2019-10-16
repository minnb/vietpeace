@extends('dashboard.app')
@section('title', 'Config')
@section('page_header', 'Add Config')
@section('stylesheet')  
    <link type="text/css" rel="stylesheet" href="{{ asset('public/dashboard/css/select2.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('public/dashboard/plugin/jquery.filer/css/jquery.filer.css') }}"/>
@endsection
@section('content')
<?php
    $comInfoArr = [];
    if(isset($data)){
        foreach($data as $item){
            if($item->code == 'COMPANY'){
                $comInfoArr = json_decode($item->data); 
            }
        }
    }
?>
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
            <div class="tabbable">
                <ul class="nav nav-tabs" id="myTab">
                    <li class="active">
                        <a data-toggle="tab" href="#comInfo">
                            <i class="red ace-icon fa fa-home bigger-120"></i> Company Info
                        </a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div id="comInfo" class="tab-pane fade in active">
                        <form class="form-horizontal" role="form" action="{{route('post.dashboard.config.info',['name'=>'COMPANY'])}}" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="<?php echo csrf_token() ?>">
                        <div id="user-profile-1" class="user-profile row">
                            <div class="col-xs-12 col-sm-8">
                                <div class="profile-user-info profile-user-info-striped">
                                    <div class="profile-info-row">
                                        <div class="profile-info-name"> Company Name </div>
                                        <input type="text" id="form-field-1" class="col-xs-12 col-sm-12" name="company" value="{{ old('company', isset($comInfoArr) ? $comInfoArr->company : '') }}" />
                                    </div>
                                    <div class="profile-info-row">
                                        <div class="profile-info-name"> Address </div>
                                        <input type="text" id="form-field-1" class="col-xs-12 col-sm-12" name="address" value="{{ old('address', isset($comInfoArr) ? $comInfoArr->address : '') }}" />
                                    </div>
                                    <div class="profile-info-row">
                                        <div class="profile-info-name"> Contact Name</div>
                                        <input type="text" id="form-field-1" class="col-xs-12 col-sm-12" name="contact" value="{{ old('contact', isset($comInfoArr) ? $comInfoArr->contact : '') }}" />
                                    </div>
                                    <div class="profile-info-row">
                                        <div class="profile-info-name"> Phone Number </div>
                                        <input type="text" id="form-field-1" class="col-xs-12 col-sm-12" name="phone" value="{{ old('phone', isset($comInfoArr) ? $comInfoArr->phone : '') }}" />
                                    </div>
                                    <div class="profile-info-row">
                                        <div class="profile-info-name"> Fax </div>
                                        <input type="text" id="form-field-1" class="col-xs-12 col-sm-12" name="fax" value="{{ old('fax', isset($comInfoArr) ? $comInfoArr->fax : '') }}" />
                                    </div>
                                    <div class="profile-info-row">
                                        <div class="profile-info-name"> Email </div>
                                        <input type="email" id="form-field-1" class="col-xs-12 col-sm-12" name="email" value="{{ old('email', isset($comInfoArr) ? $comInfoArr->email : '') }}" />
                                    </div>
                                    <div class="profile-info-row">
                                        <div class="profile-info-name"> Tax Code</div>
                                        <input type="text" id="form-field-1" class="col-xs-12 col-sm-12" name="tax" value="{{ old('tax', isset($comInfoArr) ? $comInfoArr->tax : '') }}" />
                                    </div>
                                    <?php 
                                        $path_logo = isset($comInfoArr) ? $comInfoArr->logo : ''; 
                                        $slogan = isset($comInfoArr) ? $comInfoArr->slogan : '';
                                    ?>
                                    <div class="profile-info-row">
                                        <div class="profile-info-name"> Slogan </div>
                                        <input type="text" id="form-field-1" class="col-xs-12 col-sm-12" name="slogan" value="{{ old('slogan', $slogan) }}" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-4 center">
                                <div>
                                    <span class="profile-picture">
                                        @if(File::exists($path_logo))
                                            <img id="avatar" class="editable img-responsive" alt="{{$slogan}}" src="{{asset($path_logo)}}" style="width: 180px; height: 200px;"/>
                                        @else
                                            <img id="avatar" style="width: 180px; height: 200px;" class="editable img-responsive" alt="{{$slogan}}" src="{{asset('public/dashboard/images/no-image.png')}}" />
                                        @endif
                                    </span>
                                </div>
                                <br>
                                <div>
                                    <input class="form-control" type="file" name="fileImage[]">
                                </div>
                            </div>
                        </div>
                        <div class="clearfix form-actions">
                            <div class="col-md-offset-1 col-md-9">
                                <button class="btn btn-info" type="Submit">
                                    <i class="ace-icon fa fa-check bigger-110"></i> Save Change
                                </button>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section("javascript")  
<script src="<?php echo asset('public/dashboard/plugin/func_ckfinder.js'); ?>"></script>
<script src="<?php echo asset('public/dashboard/plugin/ckeditor/ckeditor.js'); ?>"></script>
<script src="<?php echo asset('public/dashboard/plugin/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js'); ?>"></script>
<script src="{{asset('public/dashboard/js/select2.min.js') }}"></script>
<script src="{{asset('public/dashboard/js/jquery-ui.custom.min.js') }}"></script>
<script src="{{asset('public/dashboard/js/jquery.ui.touch-punch.min.js') }}"></script>
<script src="{{asset('public/dashboard/js/bootbox.js') }}"></script>
<script src="{{asset('public/dashboard/js/bootstrap-multiselect.min.js') }}"></script>
<script src="{{asset('public/dashboard/plugin/jquery.filer/js/jquery.filer.min.js') }}"></script>
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