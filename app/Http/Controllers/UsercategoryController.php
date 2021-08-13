<?php

namespace App\Http\Controllers;

use App\Models\Usercategory;
use Illuminate\Http\Request;

class UsercategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result['data']=Usercategory::all();
        return view('user_category',$result);
    }


    public function manage_category(Request $request,$id='')
    {
        if($id>0){
            $arr=Usercategory::where(['id'=>$id])->get();

            $result['category_name']=$arr['0']->category_name;
            $result['category_slug']=$arr['0']->category_slug;
            $result['id']=$arr['0']->id;
        }else{
            $result['category_name']='';
            $result['category_slug']='';
            $result['id']=0;

        }
        return view('user_manage_category',$result);
    }

    public function manage_category_process(Request $request)
    {
        //return $request->post();

        $request->validate([
            'category_name'=>'required',
            'category_slug'=>'required|unique:categories,category_slug,'.$request->post('id'),
        ]);

        if($request->post('id')>0){
            $model=Usercategory::find($request->post('id'));
            $msg="Category updated";
        }else{
            $model=new Usercategory();
            $msg="Category inserted";
        }
        $model->category_name=$request->post('category_name');
        $model->category_slug=$request->post('category_slug');
        $model->status=1;
        $model->save();
        $request->session()->flash('message',$msg);
        return redirect('userdashboard/category');

    }

    public function delete(Request $request,$id){
        $model=Usercategory::find($id);
        $model->delete();
        $request->session()->flash('message','Category deleted');
        return redirect('userdashboard/category');
    }

    public function status(Request $request,$status,$id){
        $model=Usercategory::find($id);
        $model->status=$status;
        $model->save();
        $request->session()->flash('message','Category status updated');
        return redirect('userdashboard/category');
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
     * @param  \App\Models\Usercategory  $usercategory
     * @return \Illuminate\Http\Response
     */
    public function show(Usercategory $usercategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Usercategory  $usercategory
     * @return \Illuminate\Http\Response
     */
    public function edit(Usercategory $usercategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Usercategory  $usercategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Usercategory $usercategory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Usercategory  $usercategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(Usercategory $usercategory)
    {
        //
    }
}
