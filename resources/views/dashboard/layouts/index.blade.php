@extends('dashboard.app')
@section('title', 'Dashboard')
@section('content')
<div class="page-content">
    <div class="page-header">
        <h1>
            Dashboard
            <small>
                <i class="ace-icon fa fa-angle-right"></i>
                overview &amp; stats
            </small>
        </h1>
    </div><!-- /.page-header -->
    <div class="row">
        <div class="col-xs-12">
            <div class="alert alert-block alert-success">
                <button type="button" class="close" data-dismiss="alert">
                    <i class="ace-icon fa fa-times"></i>
                </button>
                <i class="ace-icon fa fa-check green"></i>
                Welcome to
                <strong class="green">
                    VietpeaceTravel
                    <small>(v1.0)</small>
                </strong>,
            </div>
        </div>
        
    </div>
</div>
@endsection
