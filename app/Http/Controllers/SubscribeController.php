<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\DB;
use Session;


class SubscribeController extends Controller
{
    public function create(){
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
        return view('index')->with('description', 'iShops ')
            ->with('title', 'iShops  ')->with('price',  $price)->with('sum', $sum)->with('wishlist' , Session::get('wishlist'))->with('array' , [])->with('products' , $products);
    }

    public function store(){
        $input = Request::all();
        SubscribeController::create($input);

        $review = DB::insert('INSERT INTO `subscribe`(`mail`)
                                    VALUES (?)',
            [$input['email']]);

        return redirect('/');
    }
}
