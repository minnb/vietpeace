@include('dashboard.layouts.header')
@include('dashboard.layouts.nav')
@include('dashboard.layouts.sidebar')
<div class="main-content">
    <div class="main-content-inner">
        <div class="breadcrumbs ace-save-state" id="breadcrumbs">
            <ul class="breadcrumb">
                <li>
                    <i class="ace-icon fa fa-home home-icon"></i>
                    <a href="{{ url('/') }}">Home</a>
                </li>
                <li class="active">@yield('title')</li>
            </ul>
        </div>
		@yield('content')
    </div>
</div>
@include('dashboard.layouts.footer')
