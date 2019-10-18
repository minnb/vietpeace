<?php
namespace App\Http\Controllers\Dashboard;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Utils\CompanyInfo;
Use DB; use Auth;
use App\Models\User;
use App\Models\WebConfig;
use Illuminate\Support\Facades\Cache;
class ConfigController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }

    public function getConfig()
    {
        $data = DB::table('m_config')->get();
        return view('dashboard.config.add', compact('data'));
    }
    
    public function getCacheClear(){
        Cache::flush();
        return redirect()->route('dashboard');
    }

    public function postConfig(Request $request, $name){
        try{
            DB::beginTransaction();
            $check = WebConfig::where('code', $name)->first();
            if($check->count() > 0 ){
                $data = $check;
            }else{
                $data = new WebConfig();
            }
            switch ($name) {
                case 'COMPANY':
                    $comInfo = new CompanyInfo();
                    $comInfo->company = $request->company;
                    $comInfo->address = $request->address;
                    $comInfo->phone = $request->phone;
                    $comInfo->fax = $request->fax;
                    $comInfo->email = $request->email;
                    $comInfo->tax = $request->tax;
                    $comInfo->contact = $request->contact; 
                    $comInfo->slogan = $request->slogan;
                    if($request->file('fileImage')){
                        foreach(Input::file('fileImage') as $file ){
                            $destinationPath = checkFolderImage();
                            if(isset($file)){
                                $file_name = randomString().'.'.$file->getClientOriginalExtension();
                                $comInfo->logo = $destinationPath.'/'.$file_name;
                                $file->move($destinationPath, $file_name);
                            }
                        }
                    }
                    $data->data = json_encode($comInfo);
                    break;
                default:
                    echo "Hello";                    
            }
            $data->code = $name;
            $data->status = 0;
            $data->user_id = Auth::user()->id;
            $data->save();
            DB::commit();
            return back()->with(['flash_message'=>'Save change successfully']);
        }
        catch (\Exception $e) 
        {
            DB::rollBack();
            return back()->withErrors($e->getMessage())->withInput($request->input());
        }
    }
}