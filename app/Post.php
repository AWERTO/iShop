<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function index()
    {
        $posts = Post::get();
        return view('index');
    }
}
