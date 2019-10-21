<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use DB;
class Slide extends Model
{
    protected $table ="m_slides";

    public static function getSlideIndex(){
    	$data = DB::table('m_slides')->orderBy('id','desc')->limit(5)->get();
    	return $data;
    }
}
