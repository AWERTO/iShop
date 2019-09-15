<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = [
        'review_id',
        'name',
        'phone-number',
        'email',
        'message',
    ];
    protected $hidden = [
         '_token',
    ];
}
