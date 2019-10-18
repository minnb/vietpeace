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
class IndexController extends Controller
{
	public function index(){
		return view('home.layouts.index');
	}

}