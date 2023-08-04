<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CartItem extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable=['user_id','post_id','number'];

    public function post():BelongsTo
    {
        return $this->belongsTo(Post::class);
    }
    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function cartItemProductPrice()
    {
        $postPrice=$this->post->price; 
        //return $this->number * $postPrice;
        return $postPrice;

        
    }
    public function cartItemFinalPrice()
    {
        $postPrice=$this->post->price; 
        return $this->number * $postPrice ;
        
    }
}
