<?php

namespace App\Http\Controllers;

use App\Models\Userproduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserproductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

//        $result['data']=Userproduct::all();
        $result['data']=DB::table('userproducts')
            ->where(['user_id'=>auth()->user()->getAuthIdentifier()])
            ->get();
        return view('userproduct',$result);
    }


    public function manage_product(Request $request,$id='')
    {
        if($id>0){
            $arr=Userproduct::where(['id'=>$id])->get();

            $result['category_id']=$arr['0']->category_id;
            $result['name']=$arr['0']->name;
            $result['image']=$arr['0']->image;
            $result['price']=$arr['0']->price;
            $result['slug']=$arr['0']->slug;
            $result['brand']=$arr['0']->brand;
            $result['model']=$arr['0']->model;
            $result['short_desc']=$arr['0']->short_desc;
            $result['desc']=$arr['0']->desc;
            $result['keywords']=$arr['0']->keywords;
            $result['status']=$arr['0']->status;
            $result['id']=$arr['0']->id;
        }else{
            $result['category_id']='';
            $result['name']='';
            $result['slug']='';
            $result['image']='';
            $result['price']='';
            $result['brand']='';
            $result['model']='';
            $result['short_desc']='';
            $result['desc']='';
            $result['keywords']='';
            $result['status']='';
            $result['id']=0;
        }

        $result['category']=DB::table('categories')->where(['status'=>1])->get();
        return view('usermanage_product',$result);
    }

    public function manage_product_process(Request $request)
    {
        //return $request->post();
        if($request->post('id')>0){
            $image_validation="mimes:jpeg,jpg,png";
        }else{
            $image_validation="required|mimes:jpeg,jpg,png";
        }
        $request->validate([
            'name'=>'required',
            'image'=>$image_validation,
            'slug'=>'required|unique:userproducts,slug,'.$request->post('id'),
        ]);

        if($request->post('id')>0){
            $model=Userproduct::find($request->post('id'));
            $msg="Product updated";
        }else{
            $model=new Userproduct();
            $msg="Product inserted";
        }

        if($request->hasfile('image')){
            $image=$request->file('image');
            $ext=$image->extension();
            $image_name=time().'.'.$ext;
            $image->storeAs('/public/media',$image_name);
            $model->image=$image_name;
        }
        $model->category_id=$request->post('category_id');
        $model->user_id=auth()->user()->id;
        $model->name=$request->post('name');
        $model->slug=$request->post('slug');
        $model->price=$request->post('price');
        $model->brand=$request->post('brand');
        $model->model=$request->post('model');
        $model->short_desc=$request->post('short_desc');
        $model->desc=$request->post('desc');
        $model->keywords=$request->post('keywords');
        $model->status=1;
        $model->save();
        $request->session()->flash('message',$msg);
        return redirect('userdashboard/product');

    }

    public function delete(Request $request,$id){
        $model=Userproduct::find($id);
        $model->delete();
        $request->session()->flash('message','Product deleted');
        return redirect('userdashboard/product');
    }

    public function status(Request $request,$status,$id){
        $model=Userproduct::find($id);
        $model->status=$status;
        $model->save();
        $request->session()->flash('message','Product status updated');
        return redirect('userdashboard/product');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Userproduct  $userproduct
     * @return \Illuminate\Http\Response
     */
    public function show(Userproduct $userproduct)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Userproduct  $userproduct
     * @return \Illuminate\Http\Response
     */
    public function edit(Userproduct $userproduct)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Userproduct  $userproduct
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Userproduct $userproduct)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Userproduct  $userproduct
     * @return \Illuminate\Http\Response
     */
    public function destroy(Userproduct $userproduct)
    {
        //
    }
}
