<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    //
    public function user(){
        $data = DB::table('users')->get();
        return view('admin/user',['data'=>$data]);
    }

    public function delete(Request $request,$id){
        $model=User::find($id);
        $model->delete();
        $request->session()->flash('message','Product deleted');
        return back();
    }
}
