<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Post;
use App\DB;

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
    
    
    public static function getTotalAddmissionFee($post_array)
    {
        $total_addmission_fee = 0;
        foreach($post_array as $post){
            $total_addmission_fee += $post->addmission_fee;
        }
        
        return $total_addmission_fee;
    }
    
    public function getTotalPurchaseCost($user_id)
    {
        $posts = Post::where('user_id', $user_id);
        foreach($posts as $post){
            $total_purchase_cost += $post->total_purchase_cost;
        }
        
        return $total_addmission_fee;
    }
}
