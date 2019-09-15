<?php

namespace App\Http\Controllers;
use App\Products;
use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $sum = 0;
        $price = 0;
        $posts = DB::table('posts')->paginate(3);
        $products = DB::table('products')->paginate(10);
        $wishlist = Session::get('wishlist');
        if (isset($wishlist)) {

        $array = array_count_values($wishlist);
        $a = ksort($array);

        $sum=0;
        $price = [];
        foreach($array as $key =>$value)
        array_push($price , DB::table('products')->select('price')->where('products_id','=',"$key")->get());
        foreach ($price as $key => $value)
         $sum+=$value[0]->price;
        }
        return view('index',  ['posts' => $posts,
                                    'products' => $products,
                                    'title' => 'Main Page',
                                    'description' =>'dis',
                                    'wishlist' => Session::get('wishlist'),
                                    'array' => [],
                                    'price' => $price,
                                    'sum' => $sum]);

    }
}
