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
		return view('home.index.index');
	}

}