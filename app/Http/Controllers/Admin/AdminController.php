<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Session;

class AdminController extends Controller
{
    public function index()
    {
        return view('Admin.login');
    }



    public function setActive(Request $request){

        if (Session::get('active')==1){
            Session::forget('active');
            return redirect('admin');
        }
        $user = DB::table('auth')
            ->select('*')
            ->where([
                ['auth.login', '=', $request['login']],
                ['auth.password', '=', $request['password']],
            ])->get();
        if (count($user)!=0){
            Session::put('active', 1);
            return redirect('admin/main');
        } else
            return redirect('admin');
    }


    public function main(){
        $columns = ['products_id', 'name',  'photo',  'price', 'old_price', 'status'];
        if (Session::get('active')==1){
            return view('Admin.main', ['columns' => $columns,
                'products' => DB::table('products')->select('*')->get()]);

        }
        return redirect('admin');
    }

    public function action(Request $request)
    {
        if (Session::get('active')==1){
            if($request->isMethod('post')){
                DB::table('products')
                    ->where('products_id', $request['products_id'])
                    ->update(['photo' => $_FILES['image']['name']]);
                file_put_contents('images/'.$_FILES['image']['name'],file_get_contents($_FILES['image']['tmp_name']));
            }
                switch ($request['button']){
                    case 'add':
                            DB::table('products')->insert(
                                ['products_id' => $request['products_id'], 'name' => $request['name'] , 'photo' => $request['photo'], 'price' => $request['price'], 'old_price' => $request['old_price'], 'status' => $request['status']]);

                        break;
                    case 'delete':
                        DB::table('products')->where('products_id', '=', $request['products_id'])->delete();
                        break;
                    default :

                            DB::table('products')
                                ->where('products_id', $request['button'])
                                ->update(['products_id' => $request['products_id'], 'photo' => $request['photo'], 'price' => $request['price'], 'old_price' => $request['old_price'], 'status' => $request['status']]);

                        break;
                }
            return redirect('admin/main');
        } else
            return redirect('admin');
    }

}
