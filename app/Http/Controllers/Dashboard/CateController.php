<?php
namespace App\Http\Controllers\Dashboard;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
Use DB; use Auth;
use App\Models\User;
use App\Models\Category;
class CateController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }

    public function getList($names)
    {
        $cate = DB::table('categories')->where('alias',$names)->get();
        $name = $cate[0]->name;
        $data = DB::table('categories')->where('parent',$cate[0]->id)->orWhere('type', $cate[0]->id)->get();
        return view('dashboard.cate.list', compact('data', 'name'));
    }

    public function getAdd($name)
    {
        $parent = DB::table('categories')->where('alias', $name)->get()[0]->id;
        return view('dashboard.cate.add', compact('name', 'parent'));
    }

    public function postAdd(Request $request, $name){

        try{
            DB::beginTransaction();
                $data = new Category();
                $data->parent = $request->parent == 0 ? 0 : Category::find($request->parent)->id;
                $data->type = Category::find($request->parent)->parent;
                $data->name = $request->name;
                $data->description = $request->description;
                $data->content = '';
                $data->alias = makeUnicode($request->name);
                $data->sort = $request->sort;
                $data->menu = 0;
                $data->status = $request->status == 'on' ? 1 : 0;
                $data->user_id = Auth::user()->id;

                if($request->file('fileImage')){
                    foreach(Input::file('fileImage') as $file ){
                        $destinationPath = checkFolderImage();
                        if(isset($file)){
                            $file_name = randomString().'.'.$file->getClientOriginalExtension();
                            $data->image = $destinationPath.'/'.$file_name;
                            $file->move($destinationPath, $file_name);
                        }
                    }
                }
                $data->save();
                /*
                if($request->parent==0){
                    DB::table('categories')->where('id',$data->id)->update(['parent' => $data->id]);
                }else{
                    DB::table('categories')->where('id',$data->id)->update(['parent' => $request->parent]);
                }
                */
            DB::commit();
            return redirect()->route('get.dashboard.category.list',['name'=>makeUnicode($name)])->with(['flash_message'=>'Tạo mới thành công']);
         }catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors($e->getMessage())->withInput($request->input());
        }
    }

    public function getEdit($name, $idd){
        $id = fdecrypt($idd);
        $data = Category::findOrFail($id);
        $parent = DB::table('categories')->where('alias', $name)->get()[0]->id;
        return view('dashboard.cate.edit', compact('data', 'id', 'name','parent'));
    }

    public function postEdit(Request $request, $name, $idd){
        $id = fdecrypt($idd);
        try{
            DB::beginTransaction();
                $data = Category::findOrFail($id);
                $old_img = $data->image;
                $data->parent = $request->parent == 0 ? 0 : Category::find($request->parent)->id;

                $data->name = $request->name;
                $data->alias = Str::slug($request->name);
                $data->sort = $request->sort;
                $data->status = $request->status == 'on' ? 1 : 0;
                $data->user_id = Auth::user()->id;
                $data->description = $request->description;
                
                if($request->file('fileImage')){
                    foreach(Input::file('fileImage') as $file ){
                        $destinationPath = checkFolderImage();
                        if(isset($file)){
                            $file_name = randomString().'.'.$file->getClientOriginalExtension();
                            $data->image = $destinationPath.'/'.$file_name;
                            $file->move($destinationPath, $file_name);
                            delete_image_no_path($old_img);
                        }
                    }
                }
                $data->save();
            DB::commit();
            return redirect()->route('get.dashboard.category.list',['name'=>makeUnicode($name)])->with(['flash_message'=>'Chỉnh sửa dữ liệu thành công']);
         }catch (Exception $e) {
            DB::rollBack();
            return back()->withErrors($e->getMessage())->withInput($request->input());
        }
    }

    public function getDel($idd){
        $id = fdecrypt($idd);
        try{
            DB::beginTransaction();
                DB::table('categories')->where('id', $id)->update(['status'=>0]);
            DB::commit();
            return redirect()->route('get.dashboard.category.list')->with(['flash_message'=>'Chỉnh sửa dữ liệu thành công']);
         }catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors($e->getMessage())->withInput($request->input());
        }
    }

    public function postDel(Request $request, $idd){
        $id = fdecrypt($idd);
        try{
            DB::beginTransaction();
                DB::table('categories')->where('id', $id)->delete();
            DB::commit();
            return redirect()->route('get.dashboard.category.list')->with(['flash_message'=>'Chỉnh sửa dữ liệu thành công']);
         }catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors($e->getMessage())->withInput($request->input());
        }
    }
}