<?php
namespace App\Http\Controllers\Dashboard;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\Models\User;
Use DB;
Use Auth;
class DashboardController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        if($request->user()->authorizeRoles(['manager'])){
            return view('dashboard.layouts.index');
        }else{
            return redirect('/');
        }
    }

    public function getLogout(){
        Auth::logout();
        return redirect()->route('index');
    }
}