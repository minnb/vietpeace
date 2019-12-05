<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use DB;
class Post extends Model
{
    protected $table ="posts";

    public static function PostCountByCate($post_data, $post_id){
    	$count = 0;
    	foreach($post_data as $item){
			$cate_arr = convertStrToArr('|', $item->cate_id);
			$des_arr = convertStrToArr('|', $item->destinations);
			if($post_id == $item->destinations || in_array($post_id, $des_arr))
			{
				$count = $count + 1;
			}
			if($post_id == $item->cate_id || in_array($post_id, $cate_arr)){
				$count = $count + 1;
			}
		}
		return $count;
    }
}
