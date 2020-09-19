<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    protected $guarded = array('id');
    
    public static $rules = array(
        'title' => 'required | max:50',
        'spot' => 'required | max:50',
        'addmission-fee' => 'numeric',
        'purchase-cost' => 'numeric',
        'comment' => 'required | max:300',
        'addmission-fee' => 'numeric',
    );
    
    public function user()
    {
    return $this->belongsTo('App\User');
    }
    
    public function comment(){
        return $this->hasMany('App\Comment');
    }
    
    public static function getDate($id, $from, $until)
    {
        //created_atが20xx/xx/xx ~ 20xx/xx/xxのデータを取得
        $date = Post::whereBetween("created_at", [$from, $until])->where('user_id', $id)->get();

        return $date;
    }
}
