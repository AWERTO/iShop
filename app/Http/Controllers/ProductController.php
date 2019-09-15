<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Products;
use Session;

class ProductController extends Controller
{
    public function index() {

        $products = Products::all()->take(16);
        return view('product')->with('description', 'Categories ')
            ->with('title', 'Categories')
            ->with('products', $products);

    }

    public function detail() {
        $products = Products::all();
        return view('product-detail')->with('description', 'Product-detail')
            ->with('title', 'Product-detail')->with('products', $products);
    }

    public function categories(){
        $products = Products::all();

        return view('product-categories')->with('description', 'Categories')
                                    ->with('title', 'Categories')
                                    ->with('products', $products);
    }

    public function search(){
        $products = Products::all();

        return view('product-search', ['description' => 'Search',
                                     'title' => 'Search',
                                     'products' => $products]);
    }

    public function sort(){

        if($_POST['sorting'] == 'high to low'){
            $products = Products::all()->sortByDesc('price');
        }if ($_POST['sorting'] == 'low_to_high'){
            $products = Products::all()->sortBy('price');
        }if ($_POST['sorting'] == 'Default'){
            $products = Products::all();
        }

        return view('product', ['description' => 'Search',
            'title' => 'Search',
            'products' => $products]);
    }

    public function price(){

        switch ($_POST['price']) {
            case '00.00$-50$':
                $products = Products::all()->where('price', '>', '0')->where('price','<','50');
                break;
            case '50$-100$':
                $products = Products::all()->where('price', '>', '50')->where('price','<','100');
                break;
            case '100$-150$':
                $products = Products::all()->where('price', '>', '100')->where('price','<','150');
                break;
            case '150$-200$':
                $products = Products::all()->where('price', '>', '150')->where('price','<','200');
            break;
            case '$200+':
                $products = Products::all()->where('price', '>', '200');
            break;
        }
        return view('product', ['description' => 'Sort',
            'title' => 'Sort',
            'products' => $products]);
    }


    public function wishlist(){
        $sum=0;
        $products = Products::all();
        $posts = Post::all();
        $id = $_POST['id'];

        Session::push('wishlist', $_POST['id']);

        $array= (Session::get('wishlist'));

        $sum=0;
        $price = [];
        foreach($array as $key =>$value)
            array_push($price , DB::table('products')->select('price')->where('products_id','=',"$value")->get());
        foreach ($price as $key => $value)
            $sum+=$value[0]->price;
        return view('index', ['description' => 'Index',
            'title' => 'Index',
            'products' => $products,
            'posts' => $posts,
            'wishlist'=> Session::get('wishlist'),
            'sum' => $sum ]);
    }
}
