<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use DB;
use Cache;
use App\Models\WebConfig;
use App\Utils\CompanyInfo;
use App\Models\Post;
class CacheData extends Model
{
    //protected $table ="role_user";
	public static function getTourListAll(){
		if(!Cache::has('index_list_tour_cache')){
			$data_all_list_tour = Post::where('status', 1)->get();
			Cache::put('index_list_tour_cache', $data_all_list_tour, now()->addMinutes(5));
			return $data_all_list_tour;
		}else{
			return Cache::get('index_list_tour_cache');
		}
	}

	public static function getConfigCompany(){
		if(!Cache::has('info_company_config')){
			$data_company_config = WebConfig::where('code','COMPANY')->first();
			$info_company_config = new CompanyInfo();
			if(isset($info_company_config)){
				$info_company_config = json_decode($data_company_config->data); 
			}
			Cache::put('info_company_config', $info_company_config, now()->addMinutes(5));
			return $info_company_config;
		}else{
			return Cache::get('info_company_config');
		}
	}

	public static function getImgBuyCate($cate){
		if(!Cache::has('slide_image_1400x470')){
			$arrCate = '';
			if(!empty($cate)){
	        	$arrCate = DB::table('categories')->whereIn('id', convertStrToArr('|', $cate))->inRandomOrder()->first();
			}else{
				$arrCate = DB::table('categories')->whereNotNull('image')->inRandomOrder()->first();
			}
			Cache::put('slide_image_1400x470', $arrCate, now()->addMinutes(5));
			return $arrCate;
		}else{
			return Cache::get('slide_image_1400x470');
		}	
    }

    public static function getOnTopTour($option = ''){
		if(!Cache::has('science_on_top_tour')){
			$arrOntop = '';
			if(!empty($option)){
	        	$arrOntop = DB::table('posts')
	        				->where('status', 1)
	        				->select('id','cate_id','name','tags','viewed','vote','image','unit_price','day_number')
	        				->orderBy('viewed', 'desc')->first();
			}else{
				$arrOntop = DB::table('posts')
					        ->where('status', 1)
	        				->select('id','cate_id','name','tags','viewed','vote','image','unit_price','day_number')
	        				->orderBy('viewed', 'desc')->first();
			}
			Cache::put('science_on_top_tour', $arrOntop, now()->addMinutes(5));
			return $arrOntop;
		}else{
			return Cache::get('science_on_top_tour');
		}	
    }
}
