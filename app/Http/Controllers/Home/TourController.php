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
		$single_tour_id = fdecrypt($idd);
		$data = Post::findOrFail($single_tour_id);
		$seo_meta = $data->name;
		$page_title = $data->name;
		return view('home.tour.single', compact('data','single_tour_id','seo_meta','page_title'));
	}

	public function getTourList($idd, $name){
		$row_in_page = 5;
		$data_tour_all = '';
		if($idd == 0 & $name == 'all'){
			$data_tour_all = collect(CacheData::getTourListAll())->paginate($row_in_page);
		}else if($idd > 0){
			$new_collection = collect();
			foreach(collect(CacheData::getTourListAll()) as $item){
				$cate_arr = convertStrToArr('|', $item->cate_id);
				$des_arr = convertStrToArr('|', $item->destinations);
				if(count($cate_arr) == 1 || $idd == $item->cate_id || $idd == $item->destinations){
					$new_collection->push($item);
				}else{
					if(in_array($idd, $cate_arr) || in_array($idd, $des_arr)){
						$new_collection->push($item);
					}
				}
			}
			$data_tour_all = $new_collection->paginate($row_in_page);
		}
		return view('home.tour.list_all', compact('data_tour_all', 'name', 'page_title'));
	}
}