@extends('dashboard.app')
@section('title', 'Master Data')
@section('page_header', 'Cài đặt giá bán thường')
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
    <div class="row">
        <div class="col-xs-12">
            <form class="form-horizontal" role="form" action="{{ route('post.master.un_block40.import')}}" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="<?php echo csrf_token() ?>">
                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="form-field-1"></label>
                    <div class="col-sm-4">
                        <input type="file" class="col-xs-5 col-sm-5 form-control" id="id-input-file-2" name='fileExcel' required="" />
                    </div>
                    <div>
                        <button class="btn btn-white btn-danger btn-bold btn-sm"><i class="ace-icon fa fa-upload align-top bigger-125"></i> Upload file</button>
                    </div>
                </div>

            </form>
        </div>
    </div>

    <div class="clearfix form-actions">
        <div class="col-md-offset-3 col-md-9">
            <button class="btn btn-white btn-info btn-bold" type="button">
                <i class="ace-icon fa fa-check bigger-110"></i>
                Submit
            </button>
            &nbsp; &nbsp; &nbsp;
            <a class="btn btn-white btn-danger btn-bold" href="{{route('get.master.reset.ub40')}}">
                <i class="ace-icon fa fa-undo bigger-110"></i>
                Reset
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <h3 class="header smaller lighter blue">Dữ liệu import</h3>
            <div class="clearfix">
                <div class="pull-right tableTools-container"></div>
            </div>
            <div>
                <table id="dynamic-table" class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Article </th>
                            <th>Article Name</th>
                            <th class="hidden-480">Site</th>
                            <th class="hidden-480">Site Name</th>
                            <th>Type</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($data->count() > 0)
                            @foreach($data as $key=>$item)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $item->ItemCode }}</td>
                                <td>{{ $item->ItemCode }}</td>
                                <td class="hidden-480">{{ $item->StoreCode }}</td>
                                <td class="hidden-480">{{ $item->StoreName }}</td>
                                <td class="hidden-480">{{ $item->Type }}</td>

                                <td>
                                    <div class="hidden-sm hidden-xs action-buttons">
                                        <a class="blue" href="#">
                                            <i class="ace-icon fa fa-search-plus bigger-130"></i>
                                        </a>

                                        <a class="green" href="#">
                                            <i class="ace-icon fa fa-pencil bigger-130"></i>
                                        </a>

                                        <a class="red" href="#">
                                            <i class="ace-icon fa fa-trash-o bigger-130"></i>
                                        </a>
                                    </div>

                                    <div class="hidden-md hidden-lg">
                                        <div class="inline pos-rel">
                                            <button class="btn btn-minier btn-yellow dropdown-toggle" data-toggle="dropdown" data-position="auto">
                                                <i class="ace-icon fa fa-caret-down icon-only bigger-120"></i>
                                            </button>

                                            <ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
                                                <li>
                                                    <a href="#" class="tooltip-info" data-rel="tooltip" title="View">
                                                        <span class="blue">
                                                            <i class="ace-icon fa fa-search-plus bigger-120"></i>
                                                        </span>
                                                    </a>
                                                </li>

                                                <li>
                                                    <a href="#" class="tooltip-success" data-rel="tooltip" title="Edit">
                                                        <span class="green">
                                                            <i class="ace-icon fa fa-pencil-square-o bigger-120"></i>
                                                        </span>
                                                    </a>
                                                </li>

                                                <li>
                                                    <a href="#" class="tooltip-error" data-rel="tooltip" title="Delete">
                                                        <span class="red">
                                                            <i class="ace-icon fa fa-trash-o bigger-120"></i>
                                                        </span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        @endif
                </tbody>
            </table>
        </div>
</div>
@endsection
@section("javascript")  
    <script src="{{ asset('public/js/script1.js') }}"></script>
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
    </script>
@endsection