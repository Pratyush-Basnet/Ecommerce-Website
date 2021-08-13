<?php

namespace App\Http\Controllers;

use App\Models\Motercycle;
use Illuminate\Http\Request;

class MotercycleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result['data']=Motercycle::all();
        return view('admin/motorcycle',$result);
    }


    public function manage_motorcycle(Request $request,$id='')
    {
        if($id>0){
            $arr=Motercycle::where(['id'=>$id])->get();

            $result['name']=$arr['0']->name;
            $result['image']=$arr['0']->image;
            $result['motorcycle_slug']=$arr['0']->motorcycle_slug;
            $result['brand']=$arr['0']->brand;
            $result['description']=$arr['0']->descrition;
            $result['id']=$arr['0']->id;
        }else{
            $result['name']='';
            $result['image']='';
            $result['motorcycle_slug']='';
            $result['brand']='';
            $result['description']='';
            $result['status']='';
            $result['id']=0;

        }
        return view('admin/manage_motorcycle',$result);
    }

    public function manage_motorcycle_process(Request $request)
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
            'motorcycle_slug'=>'required|unique:motercycles,motorcycle_slug,'.$request->post('id'),
        ]);

        if($request->post('id')>0){
            $model=Motercycle::find($request->post('id'));
            $msg="Updated";
        }else{
            $model=new Motercycle();
            $msg="Inserted";
        }

        if($request->hasfile('image')){
            $image=$request->file('image');
            $ext=$image->extension();
            $image_name=time().'.'.$ext;
            $image->storeAs('/public/media',$image_name);
            $model->image=$image_name;
        }
        $model->name=$request->post('name');
        $model->motorcycle_slug=$request->post('motorcycle_slug');
        $model->brand=$request->post('brand');
        $model->description=$request->post('description');
        $model->status=1;
        $model->save();
        $request->session()->flash('message',$msg);
        return redirect('admin/motorcycle');

    }

    public function delete(Request $request,$id){
        $model=Motercycle::find($id);
        $model->delete();
        $request->session()->flash('message','Category deleted');
        return redirect('admin/category');
    }

    public function status(Request $request,$status,$id){
        $model=Motercycle::find($id);
        $model->status=$status;
        $model->save();
        $request->session()->flash('message','Category status updated');
        return redirect('admin/category');
    }
}
