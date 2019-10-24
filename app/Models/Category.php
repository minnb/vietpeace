<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use DB;
class Category extends Model
{
    protected $table ="categories";

    public static function getMultiCategory($parent){
    	/*
        $data = DB::table('categories')->where('status', 1)->where(function ($query, $parent){
                        $query->where('id', '=', $parent)->orWhere('parent','=', $parent);
                    })->get();
            */
        $data = DB::select('select * from categories where status = 1 and (parent = '.$parent.' OR id = '.$parent.') order by id');
    	return $data;
    }
    public static function getStrCateName($cate_id){
        $arr_cate = convertStrToArr("|", $cate_id);
        $str_cate = "";
        if(count($arr_cate) > 0 ){
            foreach($arr_cate as $item){
                $cate_name = Category::find($item)->name;
                $str_cate = $cate_name.', '.$str_cate;
            }
        }
        return $str_cate;
    }

    public static function getSelectMenu(){
    	$data = DB::table('menu')->where([
    		['status',1]
    	])->select('id','name')->orderBy('id')->get()->toArray();
    	return $data;
    }

    public static function getSelect2Category($type =''){
        $data = DB::table('categories')->where([
            ['status', 1], 
            ['parent', '>', 0], 
            ['type', '=', $type]
        ])->select('id','name')->orderBy('id')->get()->toArray();
        return $data;
    }

    public static function getMenuName($id){
    	if($id == 0){
    		return '';
    	}else{
	    	return DB::table('menu')->where([
	    		['id', $id],
	    		['status', 1]
	    	])->get()[0]->name;
	    }
    }

    public static function getParentName($parent){
    	if($parent == 0){
    		return 'Root';
    	}else{
	    	return DB::table('categories')->where([
	    		['id', $parent],
	    		['status', 1]
	    	])->get()[0]->name;
    	}
    }
}
