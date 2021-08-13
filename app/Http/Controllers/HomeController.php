<?php

namespace App\Http\Controllers;


use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Cart;
use App\Models\Review;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $result['home_banner']=DB::table('home_banners')
            ->where(['status'=>1])
            ->get();

        return view('home',$result);
    }


    public function product(Request $request)
    {
        $result['product']=DB::table('products')
            ->where(['status'=>1])
            ->get();
        return view('product',$result);
    }

    public function motorcycle(Request $request){
        $result['motorcycle']=DB::table('motercycles')
            ->where(['status'=>1])
            ->get();
        return view('motorcycle',$result);

    }

    public function motorcycle_detail(Request $request,$motorcycle_slug){
        $result['moto']=DB::table('motercycles')
            ->where(['status'=>1])
            ->where(['motorcycle_slug'=>$motorcycle_slug])
            ->get();
        return view('motorcycledetail',$result);

    }

    public function checkout(){
        $userCartItems=Cart::userCartItems();
        /*echo "<pre>"; print_r($userCartItems); die;*/
        return view('checkout')->with(compact('userCartItems'));
    }

    public function checkoutdelete(Request $request,$id){
        $model=Cart::find($id);
        $model->delete();
        $request->session()->flash('message','Product deleted');
        return back();
    }

    public function detail(Request $request,$slug){
        $result['detail']=DB::table('products')
            ->where(['status'=>1])
            ->where(['slug'=>$slug])
            ->get();
        return view('detail',$result);

    }

    public function add_to_cart(Request $request){
         if($request->isMethod('post')){
             $data=$request->all();

             $session_id = Session::get('session_id');
             if(empty($session_id)){
                 $session_id = Session::getId();
                 Session::put('session_id',$session_id);
             }
             $cart=new Cart;
             $cart->session_id = $session_id;
             $cart->user_id=Auth()->user()->id;
             $cart->product_id=$data['product_id'];
             $cart->quantity=$data['quantity'];
             $cart->save();

             $message = 'Product has been added in Cart';
             session::flash('success_message',$message);
             return redirect()->back();




         }


    }


    public function userproduct(Request $request){
        $result['userproduct']=DB::table('userproducts')
            ->where(['status'=>1])
            ->get();
        return view('userdisplayproducts',$result);
    }

    public function userproductdetail(Request $request,$slug){
        $result['userproductsdetail']=DB::table('userproducts')
            ->where(['status'=>1])
            ->where(['slug'=>$slug])
            ->get();
        return view('userdisplayproductsdetail',$result);

    }

    public function addorder(Cart $item){

        return view('orderform',['item'=>$item]);
    }

    public function addingorder(Request $request,Cart $item){
        $request->validate([
            'first_name'=>'required',
            'last_name'=>'required',
            'mobile'=>'required|max:10',
            'address'=>'required',
            'city'=>'required',
            'district'=>'required',
        ]);
        $model=new Order();
        $model->products_id=$item['product_id'];
        $model->first_name=$request->post('first_name');
        $model->last_name=$request->post('last_name');
        $model->email=auth()->user()->email;
        $model->mobile=$request->post('mobile');
        $model->address=$request->post('address');
        $model->city=$request->post('city');
        $model->district=$request->post('district');
        $model->total=$item['product']['price']*$item['quantity'];
        $model->save();
        $cart=Cart::find($item['id']);
        $cart->delete();
        $userCartItems=Cart::userCartItems();

        return view('checkout')->with(compact('userCartItems'));

    }

    public function userdashboard(){
        return view('user-home');
    }


    public function review(Request $request){
        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'product_id'=>'required',
            'review'=>'required'
        ]);
        $model=new Review();
        $model->name=$request->post('name');
        $model->email=$request->post('email');
        $model->product_id=$request->post('product_id');
        $model->review=$request->post('review');
        $model->save();
        $message = 'Comment added successfully';
        session::flash('success_message',$message);
        return back();
    }





}
