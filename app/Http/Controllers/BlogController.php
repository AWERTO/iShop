<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;


class BlogController extends Controller
{


    public function index() {
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
        $posts = DB::table('posts')->paginate(100);
        $categories = DB::table('categories')->paginate(10);
        return view('blog')->with('description', 'iShops Blog')
            ->with('title', 'iShops Contact ')->with('price',  $price)->with('sum', $sum)->with('wishlist' , Session::get('wishlist'))->with('array' , [])->with('products' , $products)->with('posts', $posts)->with('categories', $categories);
    }
    public function detail() {
        $sum = 0;
        $price = 0;
        $products = DB::table('products')->paginate(10);
        $wishlist = Session::get('wishlist');
        if (isset($wishlist)) {

            $array = array_count_values($wishlist);
            $a = ksort($array);
            $posts = DB::table('posts')->paginate(100);
            $categories = DB::table('categories')->paginate(10);
            $sum=0;
            $price = [];
            foreach($array as $key =>$value)
                array_push($price , DB::table('products')->select('price')->where('products_id','=',"$key")->get());
            foreach ($price as $key => $value)
                $sum+=$value[0]->price;
        }

        return view('blog-detail')->with('description', 'iShops Blog-detail')
            ->with('title', 'iShops Contact ')->with('price',  $price)->with('sum', $sum)->with('wishlist' , Session::get('wishlist'))->with('array' , [])->with('products' , $products)->with('posts', $posts)->with('categories', $categories);;

    }
}
