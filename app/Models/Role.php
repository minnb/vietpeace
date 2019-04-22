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

}
