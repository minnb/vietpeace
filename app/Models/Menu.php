<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use DB;
use Cache;
class Menu extends Model
{
    protected $table ="menu";

    public static function getListMenu(){
        $data = Menu::where('status', 1)->orderBy('sort')->get()->toArray();
        if(isset($data)){
            return $data;
        }else{
            return null;
        }
    }

    public static function getSubMenuFromCate($menu){
        $cate = Category::where('menu', $menu)->get();
        $data = [];
        if($cate->count() > 0){
            $data = Category::where('parent', $cate[0]->id)->orderBy('sort')->get()->toArray();
        }
        return $data;
    }

    public static function getSub2MenuFromCate($id){
        return Category::where('parent', $id)->orderBy('sort')->get()->toArray();
        
        // if($id > 0)
        // {
        //     if(Cache::get('sub2Menu-'.$id))
        //     {
        //         $data = Cache::get('sub2Menu-' . $id);
        //     }else
        //     {
        //         $data = Cache::add('sub2Menu-' . $id, Category::where('parent', $id)->orderBy('sort')->get()->toArray(), 360);
        //     }
        //     return $data;
        // }else{
        //     return [];
        // }
    }
}
