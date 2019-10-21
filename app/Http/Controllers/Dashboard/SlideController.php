<?php
namespace App\Http\Controllers\Dashboard;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
Use DB; use Auth;
use App\Models\User;
use App\Models\Post;
use App\Models\Slide;
class SlideController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }

    public function getAdd($name, $id){
    	$data = Slide::orderBy('id', 'desc')->get();   	
    	return view('dashboard.slide.add', compact('data', 'name', 'id'));
    }

    public function postAdd(Request $request, $name, $id){
    	if($id > 0 && $name == 'edit'){
    		$data = Slide::findOrFail($id);
    	}elseif ($id == 0 && $name == 'add') {
    		$data = new Slide();
    	}
        try{
            DB::beginTransaction();
                $data->name = $request->name;
                $data->name2 = $request->name2;
                $data->alias = makeUnicode($request->name);
                $data->tags = '';
                $data->url = $request->url;
                $data->status = $request->status == 'on' ? 1 : 0;
                $data->user_id = Auth::user()->id;
                $data->from_date = date('Y-m-d');
                $data->to_date = date('Y-m-d');

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
            return redirect()->route('get.dashboard.slide.add', ['name'=>'list', 'id'=>'0'])->with(['flash_message'=>'Created data successfully']);
         }catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors($e->getMessage())->withInput($request->input());
        }
    }

    public function postDelete($id){
        // try{
        //     DB::beginTransaction();
        //         $data = Slide::findOrFail($id);
        //         if($data->image != ''){
        //         	delete_image_no_path($data->image);
        //         }
        //         $data->delete();
        //     DB::commit();
        //     return redirect()->route('get.dashboard.slide.add', ['name'=>'list', 'id'=>'0'])->with(['flash_message'=>'Delete data successfully']);
        //  }catch (\Exception $e) {
        //     DB::rollBack();
        //     return $e->getMessage();
        //     //return back()->withErrors($e->getMessage())->withInput($request->input());
        // }
    }
}