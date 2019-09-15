<?php

namespace App\Http\Controllers;

use App\Products;
use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function index() {
        $products = Products::all();
        $wishlist=Session::get('wishlist');
        $array= array_count_values($wishlist);
        $a= ksort($array);
        $sum=0;
        $price = [];
        foreach($array as $key =>$value)
            array_push($price , DB::table('products')->select('price')->where('products_id','=',"$key")->get());
        foreach ($price as $key => $value)
            $sum+=$value[0]->price;
        return view('cart', ['description' => 'iShops Cart',
                                'title' => 'iShops Cart ',
                                'products' => $products,
                                'wishlist' => Session::get('wishlist'),
                                'array' => [],
                                'sum' => $sum]);
    }
    public function reset(){
        Session::put('wishlist', null);
        $products = Products::all();
        $posts = DB::table('posts')->paginate(3);
        $sum=0;
        $price = [];
        return view('index', ['description' => 'iShops Cart',
            'title' => 'iShops Cart ',
            'products' => $products,
            'posts' => $posts,
            'wishlist' => Session::get('wishlist'),
            'sum' => $sum]);
    }

}
