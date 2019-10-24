<?php
namespace App\Http\Controllers\Home;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Cache;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Utils\CacheDataService;
Use DB; use Auth;
use App\Models\Post; use App\Models\CacheData;
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
		$row_in_page = 5;
		$data_tour_all = '';
		if($idd == 0 & $name == 'all'){
			$data_tour_all = Post::where('status', 1)->orderBy('viewed', 'desc')->paginate($row_in_page);
		}else{
			$new_collection = collect();
			foreach(collect(CacheData::getTourListAll()) as $item){
				if(in_array($idd, convertStrToArr('|', $item->cate_id))){
					$new_collection = $item;
				}
			}
			$data_tour_all = $new_collection->paginate($row_in_page);
		}
		return view('home.tour.list_all', compact('data_tour_all'));
	}
}