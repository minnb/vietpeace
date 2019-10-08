<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use DB;
class Role extends Model
{
    protected $table ="roles";
    
    public function users()
	{
	  return $this
	    ->belongsToMany('App\Models\User')
	    ->withTimestamps();
	}

	public static function getRole($id = ""){
		if($id==""){
			return Role::orderBy('id','ASC')->get();
		}else{
			return Role::where('user_id',$id)->get();
		}
	}

	public static function getRoleSelect(){
		$user = DB::table('roles')->select('id','name')->get();
		return $user;
	}

	public static function getSelectMultiRole(){
        $data = DB::table('roles')->select('id','name')->orderBy('id')->get()->toArray();
        return $data;
    }

    public static function getStrRoleName($role_id){
        $arr_cate = $role_id == '' ? [] : convertStrToArr("|", $role_id);
        $str_cate = "";
        if(count($arr_cate) > 0 ){
            foreach($arr_cate as $item){
                $cate_name = Role::find($item)->name;
                $str_cate = $cate_name.', '.$str_cate;
            }
        }
        return $str_cate;
    }
}
