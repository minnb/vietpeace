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
class TourController extends Controller
{
	public function getTourSingle($idd, $name){
		$id = fdecrypt($idd);
		$data = Post::findOrFail($id);

		return view('home.tour.single', compact('data'));
	}

	public function getTourList($idd, $name){
		$data_tour_all = Post::where('status', 1)->paginate(5);
		return view('home.tour.list_all', compact('data_tour_all'));
	}
}