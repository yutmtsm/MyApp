<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Personal extends Model
{
    protected $guarded = array('id');

    // 以下を追記
    public static $rules = array(
        'email' => 'required',
        'password' => 'required',
        'name' => 'required',
        'gender' => 'accept',
        'age' => 'numeric|between:15,120',
        'residence' => 'required',
    );
}
