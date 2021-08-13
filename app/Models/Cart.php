<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class Cart extends Model
{
    use HasFactory;

    public static function userCartItems(){
        if (Auth::check()){
            $userCartItems = Cart::with(['product'=>function($query){
                $query->select('id','name','image','price');

            }])->where('user_id',Auth()->user()->id)->get()->toArray();

        }else{
            $userCartItems = Cart::with(['product'=>function($query) {
                $query->select('id','name', 'image','price');
            }])->where('session_id',Session::get('session_id'))->get()->toArray();
        }

        return $userCartItems;

    }
    public function product(){
        return $this->belongsTo('App\Models\Product','product_id');
    }

}
