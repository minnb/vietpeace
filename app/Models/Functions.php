<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use DB;
class Functions extends Model
{
    protected $table ="functions";
    
    public static function  getParentFunction(){
    	$data = DB::table('functions')->where('url','#')->select('id','name')->get()->toArray();
    	if(isset($data)){
    		return $data;
    	}else{
    		return $arrayName = array('id' => -1,'name'=>"" );
    	}
    }

    public static function getParentName($parent){
    	if($parent > 0){
    		return DB::table('functions')->where('parent', $parent)->get()[0]->name;
    	}else{
    		return 'Root';
    	}
    }
}
