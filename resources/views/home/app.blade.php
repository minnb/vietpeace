<?php
	$info_company_config = App\Models\CacheData::getConfigCompany();
?>
@include('home.layouts.header')
@include('home.layouts.nav')
    @yield('content')
@include('home.layouts.footer')
