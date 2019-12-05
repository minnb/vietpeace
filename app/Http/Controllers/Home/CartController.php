<?php
namespace App\Http\Controllers\Home;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Cache;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Utils\CacheDataService;
Use DB; use Auth;
use App\Models\Post; use App\Models\CacheData;
use App\Models\Category;
use App\Models\WebConfig;
use App\Utils\CompanyInfo;
use App\Utils\ShoppingCart;
use App\Utils\AtributesCart;
use Session;
use Cart;
class CartController extends Controller
{
	public function getCartInfo(){
		if(!Cart::isEmpty()){
            return view('home.tour.checkout');
        }else{
        	return back();
        }
	}

	public function postAddCart(Request $request, $idd){
		$single_tour_id = fdecrypt($idd);
		$data = Post::findOrFail($single_tour_id);
		Cart::add(array(
		    'id' => $single_tour_id,
		    'name' => $data->name,
		    'price' => $data->unit_price,
		    'quantity' => 1,
		    'attributes' => array(
			    'book_date'=> $request->book_date,
				'adults' => $request->quantity_adults,
				'children' => $request->quantity_adults
			)
		));
		return redirect()->route('index.tour.cart.get');
	}

	public function getPayment (){
		if(!Cart::isEmpty()){
            return view('home.tour.payment');
        }else{
        	return back();
        }
	}

	public function postPayment (Request $request){
		if(!Cart::isEmpty()){
            
        }else{
        	return back();
        }
	}

	public function getDeleteCart(){
		if(!Cart::isEmpty()){
            Cart::clear();
            return redirect()->route('index');
        }else{
        	return back();
        }
	}
}