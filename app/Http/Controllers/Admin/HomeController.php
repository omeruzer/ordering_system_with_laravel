<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Shop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(){

        $shop_id = Shop::where('user_id',Auth::id())->first();

        $categories = Category::where('shop_id',$shop_id->user_id)->count();
        $products = Product::where('shop_id',$shop_id->user_id)->count();


        return view('admin.home',compact('categories','products'));
    }
}
