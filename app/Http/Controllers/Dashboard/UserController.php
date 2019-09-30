<?php
namespace App\Http\Controllers\Dashboard;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Role_User;
Use DB;
Use Auth;
class UserController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }
    public function getList()
    {
        $data = User::get();
        return view('dashboard.user.list', compact('data'));
    }
    public function getAdd()
    {
        return view('dashboard.user.add');
    }
    public function postAdd(Request $request)
    {
        try{
            $validator = Validator::make($request->all(), [
                'name' => 'required|string|max:191',
                'email' => 'required|unique:users',
                'password' => 'required|min:6',
            ]);

            if ($validator->fails()) {
                return back()->withInput($request->input())->withErrors($validator);
            }

            DB::beginTransaction();
                $data = new User();
                $data->name = $request->name;
                $data->email = $request->email;
                $data->password = Hash::make($request->password);
                $data->blocked = $request->status == 'on' ? 1 : 0;
                $data->save();
                $user_id = $data->id;
                    $role_user = new Role_User();
                    $role_user->user_id = $user_id;
                    $role_user->role_id = $request->role;
                    $role_user->save();
            DB::commit();
            return redirect()->route('get.dashboard.user.list')->with(['flash_message'=>'Created data successfully']);
         }catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors($e->getMessage())->withInput($request->input());
        }
    }
    public function getEdit($idd)
    {
        $id = fdecrypt($idd);
        $data = User::findOrFail($id);
        return view('dashboard.user.edit', compact('data', 'id'));
    }
    public function postEdit(Request $request, $idd)
    {
        $id = fdecrypt($idd);
         try{
            if($request->password == ''){
                $validator = Validator::make($request->all(), [
                    'name' => 'required|string|max:191'
                ]);
            }else{
                $validator = Validator::make($request->all(), [
                    'name' => 'required|string|max:191',
                    'password' => 'min:6',
                ]);
            }
           
            if ($validator->fails()) {
                return back()->withErrors($validator)->withInput($request->input());
            }
            DB::beginTransaction();
                $data = User::findOrFail($id);
                $data->name = $request->name;
                if($request->password != ''){
                    $data->password = Hash::make($request->password);
                }
                $data->blocked = $request->status;
                $data->save();
                Role_User::where('user_id',$data->id)->update(['role_id'=>$request->role]);
            DB::commit();
            return redirect()->route('get.dashboard.user.list')->with(['flash_message'=>'Edited data successfully']);
         }catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors($e->getMessage())->withInput($request->input());
        }
    }
    public function postDel(Request $request, $idd)
    {
        $id = fdecrypt($idd);
        try{
            DB::beginTransaction();
                DB::table('users')->where('id', $id)->delete();
            DB::commit();
            return redirect()->route('get.dashboard.user.list')->with(['flash_message'=>'Deleted data successfully']);
         }catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors($e->getMessage())->withInput($request->input());
        }
    }
}