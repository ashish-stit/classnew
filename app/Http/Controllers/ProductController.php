<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\product_order_product;
use Auth;

class ProductController extends Controller
{
    public function showdesign()
    {
        $id=Auth::id();
        $all_data=product_order_product::where('user_id',$id)->get();
        return view('instructor.design.showdesign', compact('all_data'));
    }
     public function alldesign()
    {
        $all_data=product_order_product::get();
        return view('instructor.design.showdesign', compact('all_data'));
    }
}
