<?php
namespace App\Http\Controllers\Dashboard;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
Use DB; use Auth;
use App\Models\User;
use App\Models\Category;
class PostController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }

    public function getList()
    {
        $data = DB::table('posts')->get();
        return view('dashboard.post.list', compact('data'));
    }

    public function getAdd()
    {
        return view('dashboard.post.add');
    }

    public function postAdd(Request $request){
        try{
            DB::beginTransaction();
                $data = new Post();
                $data->name = $request->name;
                $data->cate_id = implode("|",$request->cate_id);
                $data->alias = makeUnicode($request->name);
                $data->description = $request->description;
                $data->content = $request->content;
                $data->status = $request->status == 'on' ? 1 : 0;
                $data->user_id = Auth::user()->id;
                $data->ref = $request->content;
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
            DB::commit();
            return redirect()->route('get.dashboard.post.list')->with(['flash_message'=>'Tạo mới thành công']);
         }catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors($e->getMessage())->withInput($request->input());
        }
        
    }

    public function getEdit($idd){
        $id = fdecrypt($idd);
        $data = Category::findOrFail($id);
        return view('dashboard.cate.edit', compact('data', 'id'));
    }

    public function postEdit(Request $request, $idd){
        $id = fdecrypt($idd);
        try{
            DB::beginTransaction();
                $data = Category::findOrFail($id);
                $old_img = $data->image;
                $data->name = $request->name;
                $data->alias = makeUnicode($request->name);
                $data->sort = $request->sort;
                $data->menu = $request->menu;
                $data->parent = $request->parent == 0 ? 0 : Category::find($request->parent)->id;
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
            return redirect()->route('get.dashboard.category.list')->with(['flash_message'=>'Chỉnh sửa dữ liệu thành công']);
         }catch (\Exception $e) {
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

    public function postDel($idd){
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