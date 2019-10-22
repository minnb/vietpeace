<?php
namespace App\Http\Controllers\Home;
use Illuminate\Support\Facades\Cache;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Utils\CacheDataService;
Use DB; use Auth;
use App\Models\Post;
use App\Models\Category;
use App\Models\WebConfig;
use App\Utils\CompanyInfo;
use Session;
class IndexController extends Controller
{
	public function index(Request $request){
		if(!Session::has('info_company_config')){
			$data_company_config = WebConfig::where('code','COMPANY')->first();
			$info_company_config = new CompanyInfo();
			if(isset($info_company_config)){
				$info_company_config = json_decode($data_company_config->data); 
			}
			Session::put('info_company_config', $info_company_config);
		}
		
		return view('home.layouts.index');
	}

	public function getSingleTour($idd, $name){
		$id = fdecrypt($idd);
		$data = Post::findOrFail($id);

		return view('home.tour.single', compact('data'));
	}
}