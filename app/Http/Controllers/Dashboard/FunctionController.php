<?php
namespace App\Http\Controllers\Dashboard;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\Functions;
Use DB;
Use Auth;
class FunctionController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }

    public function getList()
    {
        $data = DB::table('functions')->get();
        if(isset($data)){
            return view('dashboard.function.list', compact('data'));
        }else{
            return back()->with(['flash_message'=>'No data']);;
        }
        
    }

    public function getAdd()
    {
        return view('dashboard.function.add');
    }
    
    public function postAdd(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:191',
            'url' => 'required|string|max:191',
        ]);

        if ($validator->fails()) {
            return back()->withInput($request->input())->withErrors($validator);
        }

        if(trim($request->url) == '#'){
            if($request->parent > 0){
                back()->withErrors($e->getMessage())->withInput($request->input());
            }
        }
        try{
            DB::beginTransaction();
            $data = new Functions();
            $data->name = $request->name;
            $data->url = $request->url;
            $data->param = $request->param;
            $data->parent = $request->parent;
            $data->class = $request->classCss;
            $data->sort = $request->sort;
            $data->blocked = $request->status == 'on' ? 1 : 0;
            $data->permissions = implode("|",$request->permissions);
            $data->save();
            DB::commit();
            return redirect()->route('get.dashboard.function.list')->with(['flash_message'=>'Created data successfully']);
         }catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors($e->getMessage())->withInput($request->input());
        }
    }
    
    public function getEdit($idd)
    {
        $id = fdecrypt($idd);
        $data = Functions::findOrFail($id);
        return view('dashboard.function.edit', compact('data', 'id'));
    }
    
    public function postEdit(Request $request, $idd)
    {
        $id = fdecrypt($idd);
        if(trim($request->url) == '#'){
            if($request->parent > 0){
               return back()->withErrors("Url and Parent are different")->withInput($request->input());
            }
        }
        try{
            DB::beginTransaction();
            $data = Functions::findOrFail($id);
            $data->name = $request->name;
            $data->url = $request->url;
            $data->param = $request->param;
            $data->parent = $request->parent;
            $data->class = $request->classCss;
            $data->sort = $request->sort;
            $data->blocked = $request->status;
            $data->permissions = implode("|",$request->permissions);
            $data->save();
            DB::commit();
            return redirect()->route('get.dashboard.function.list')->with(['flash_message'=>'Edited data successfully']);
         }catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors($e->getMessage())->withInput($request->input());
        }
    }

    public function postDel($idd)
    {
        
    }
}