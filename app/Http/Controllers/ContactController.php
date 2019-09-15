<?php

namespace App\Http\Controllers;


use Carbon\Carbon;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\DB;
use Session;


class ContactController extends Controller
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
        return view('contact')->with('description', 'iShops Contact')
            ->with('title', 'iShops Contact ')->with('price',  $price)->with('sum', $sum)->with('wishlist' , Session::get('wishlist'))->with('array' , [])->with('products' , $products);
    }

    public function create(){

        return view('contact')->with('description', 'iShops Contact')
            ->with('title', 'iShops Contact ');
    }

    public function store(){
        $input = Request::all();
        ContactController::create($input);
        $input['created_at']= Carbon::now();

        $review = DB::insert('INSERT INTO `review`(`name`, `phone-number`, `email`, `message`, `_token`, `created_at`)
                                    VALUES (?,?,?,?,?,?)',
                                    [$input['name'],$input['phone-number'],$input['email'],$input['message'],$input['_token'],$input['created_at']]);

        return redirect('/contact');
    }
}
