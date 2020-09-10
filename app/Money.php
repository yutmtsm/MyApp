<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Post;

class Money extends Model
{
    //
    protected $fillable = [
        'date_number'
    ];
    
    public function user()
    {
    return $this->belongsTo('App\User');
    }
    
    public function total_month()
    {
        
    }
}
