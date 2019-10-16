<?php
	$data_company_config = App\Models\WebConfig::where('code','COMPANY')->first();
	$info_company_config = new App\Utils\CompanyInfo();
	if(isset($info_company_config)){
		$info_company_config = json_decode($data_company_config->data); 
	}
?>
@include('home.layouts.header')
@include('home.layouts.nav')
    @yield('content')
@include('home.layouts.footer')
