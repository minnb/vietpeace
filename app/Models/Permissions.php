<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use DB;
class Permissions extends Model
{
    protected $table ="permissions";
    public static function getRoleByFunction($function_id){
        $str = '';
        $data = DB::table('permissions')->where('func_id', $function_id)->select('role_id')->get();
        if($data->count() > 0 ){
            foreach($data as $item){
                $str = $str.'|'.$item;
            }
        }
        return $str;
    }
}
