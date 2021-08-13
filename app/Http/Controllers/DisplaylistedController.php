<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Displaylisted;
use App\Models\Review;
use App\Models\Userproduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DisplaylistedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function userdisplay(){
        $data = DB::table('userproducts')->get();
        return view('admin/userlisted',['data'=>$data]);
    }

    public function delete(Request $request,$id){
        $model=Userproduct::find($id);
        $model->delete();
        $request->session()->flash('message','Product deleted');
        return back();
    }

    public function userreview(){
        $data = DB::table('reviews')->get();
        return view('admin/review',['data'=>$data]);
    }
    public function deletereview(Request $request,$id){
        $model=Review::find($id);
        $model->delete();
        $request->session()->flash('message','Product deleted');
        return back();
    }

    public function order(){
        $data = DB::table('orders')->get();
        return view('admin/order',['data'=>$data]);
    }

    public function deleteorder(Request $request,$id){
        $model=Cart::find($id);
        $model->delete();
        $request->session()->flash('message','Product deleted');
        return back();
    }


}
