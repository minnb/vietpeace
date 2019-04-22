<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use DB;
class Role_User extends Model
{
    protected $table ="role_user";
     protected $fillable = [
        'role_id', 'user_id'
    ];

    public static function getRoleIdByUserId($user_id){
		$user = Role_User::where('user_id',$user_id)->get();
		return $user;
	}

	public static function getRoleIdFromUserId($user_id){
		$role = Role_User::where('user_id',$user_id)->get();
		
		return $role[0]->role_id;
	}

	public static function insertRoleUser($user_id){
		$check = Role_User::where('user_id',$user_id)->get();
		if($check->count() == 0){
			Role_User::create([
                'user_id' => $user_id,
                'role_id' => 3
            ]);
		}
		return 0;
	}

}
