<?php
namespace App\Http\Controllers\Dashboard;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
Use DB; use Auth;
use App\Models\User;
use App\Models\Post;
use App\Models\Category;
use App\Utils\Post_Full_Trip;
use App\Utils\Post_Guide_Transport;
use App\Utils\Post_Hotels;
use App\Utils\Post_Meals;
use App\Utils\Post_Trip_FAQ;
use App\Utils\Post_Gallery;
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
        $Post_Full_Trip = new Post_Full_Trip();
        $Post_Guide_Transport = new Post_Guide_Transport();
        $Post_Hotels = new Post_Hotels();
        $Post_Meals = new Post_Meals(); 
        $Post_Trip_FAQ = new Post_Trip_FAQ();
        try{
            DB::beginTransaction();
                $data = new Post();
                $data->name = $request->name;
                $data->cate_id = implode("|",$request->style_tour);
                $data->destinations = implode("|",$request->destinations);
                $data->alias = makeUnicode($request->name);
                $data->description = $request->description;
                $data->content = $request->content;
                $data->status = $request->status == 'on' ? 1 : 0;
                $data->user_id = Auth::user()->id;
                $data->viewed = 0;
                $data->vote = 0;
                $Post_Full_Trip->content = $request->content_full;
                $Post_Guide_Transport->content = $request->content_guide;
                $Post_Hotels->content = $request->content_hotel;
                $Post_Meals->content = $request->content_meal;
                $Post_Trip_FAQ->content = $request->content_trip_faq;

                $data->full_trip = json_encode($Post_Full_Trip);
                $data->guide_transport = json_encode($Post_Guide_Transport);
                $data->hotels = json_encode($Post_Hotels);
                $data->meals = json_encode($Post_Meals);
                $data->trip_faq = json_encode($Post_Trip_FAQ);

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

                if($request->file('galleryImage')){
                    $Post_Gallery = new Post_Gallery();
                    $galleryArr = [];
                    foreach(Input::file('galleryImage') as $file ){
                        $destinationPath = checkFolderImage();
                        if(isset($file)){
                            $file_name = randomString().'.'.$file->getClientOriginalExtension();
                            array_push($galleryArr,$destinationPath.'/'.$file_name);
                            $file->move($destinationPath, $file_name);
                        }
                    }
                    $Post_Gallery->arr_images = $galleryArr;
                    $data->gallery = json_encode($Post_Gallery);
                }

                $data->save();
            DB::commit();
            return redirect()->route('get.dashboard.post.list')->with(['flash_message'=>'Created data successfully']);
         }catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors($e->getMessage())->withInput($request->input());
        }
    }

    public function getEdit($idd){
        $id = fdecrypt($idd);
        $data = Post::findOrFail($id);
        $galleryImg = json_decode($data['gallery'],true)['arr_images']; 
        return view('dashboard.post.edit', compact('data', 'id','galleryImg'));
    }

    public function postEdit(Request $request, $idd){
        $id = fdecrypt($idd);
        $Post_Full_Trip = new Post_Full_Trip();
        $Post_Guide_Transport = new Post_Guide_Transport();
        $Post_Hotels = new Post_Hotels();
        $Post_Meals = new Post_Meals();
        $Post_Trip_FAQ = new Post_Trip_FAQ();
        try{
            DB::beginTransaction();
                $data = Post::findOrFail($id);
                $old_img = $data->image;
                $data->name = $request->name;
                $data->cate_id = implode("|",$request->style_tour);
                $data->destinations = implode("|",$request->destinations);
                $data->alias = makeUnicode($request->name);
                $data->description = $request->description;
                $data->content = $request->content;
                $data->status = $request->status == 'on' ? 1 : 0;
                $data->day_number = $request->day_number;
                $data->unit_price = $request->unit_price;
                $data->user_id = Auth::user()->id;
                $Post_Full_Trip->content = $request->content_full;
                $Post_Guide_Transport->content = $request->content_guide;
                $Post_Hotels->content = $request->content_hotel;
                $Post_Meals->content = $request->content_meal;
                $Post_Trip_FAQ->content = $request->content_trip_faq;
                
                $data->full_trip = json_encode($Post_Full_Trip);
                $data->guide_transport = json_encode($Post_Guide_Transport);
                $data->hotels = json_encode($Post_Hotels);
                $data->meals = json_encode($Post_Meals);
                $data->trip_faq = json_encode($Post_Trip_FAQ);

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

                if($request->file('galleryImage')){
                    $Post_Gallery = new Post_Gallery();
                    $galleryArr = [];
                    foreach(Input::file('galleryImage') as $file ){
                        $destinationPath = checkFolderImage();
                        if(isset($file)){
                            $file_name = randomString().'.'.$file->getClientOriginalExtension();
                            array_push($galleryArr,$destinationPath.'/'.$file_name);
                            $file->move($destinationPath, $file_name);
                        }
                    }
                    if(isset($data->gallery)){
                        $Post_Gallery->arr_images = array_merge(json_decode($data->gallery,true)['arr_images'], $galleryArr);
                    }else{
                        $Post_Gallery->arr_images = $galleryArr;
                    }
                    
                    $data->gallery = json_encode($Post_Gallery);
                }

                $data->save();

            DB::commit();
            return redirect()->route('get.dashboard.post.list')->with(['flash_message'=>'Edited data successfully']);
         }catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors($e->getMessage())->withInput($request->input());
        }
    }

    public function getDel($idd){
        $id = fdecrypt($idd);
        try{
            DB::beginTransaction();
                DB::table('posts')->where('id', $id)->update(['status'=>0]);
            DB::commit();
            return redirect()->route('get.dashboard.post.list')->with(['flash_message'=>'Edited data successfully']);
         }catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors($e->getMessage())->withInput($request->input());
        }
    }

    public function postDel($idd){
        $id = fdecrypt($idd);
        try{
            DB::beginTransaction();
                DB::table('posts')->where('id', $id)->delete();
            DB::commit();
            return redirect()->route('get.dashboard.post.list')->with(['flash_message'=>'Deleted data successfully']);
         }catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors($e->getMessage())->withInput($request->input());
        }
    }

    public function deleteImageGallery(Request $request){
        try{
            if(isset($request->img) && isset($request->id)){
                DB::beginTransaction();
                    $post_Gallery = new Post_Gallery();
                    $post = Post::findOrFail($request->id);
                    $gallery = json_decode($post->gallery,true)['arr_images'];
                    delete_image_no_path($gallery[$request->img]);
                    unset($gallery[$request->img]);

                    $post_Gallery->arr_images = $gallery;
                    
                    $post->gallery = json_encode($post_Gallery);
                    $post->save();
                DB::commit();
                return 'success';
            }
        }catch (\Exception $e) {
            DB::rollBack();
            return $e->getMessage();
        }
        
    }
}