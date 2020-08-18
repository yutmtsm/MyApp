<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    protected $guarded = array('id');
    
    public static $rules = array(
        'title' => 'required | max:25',
        // 'spot' => 'required | max:50',
        // 'addmission-fee' => 'numeric',
        // 'purchase-cost' => 'numeric',
        'comment' => 'required | max:300',
        'addmission-fee' => 'numeric',
    );
}
