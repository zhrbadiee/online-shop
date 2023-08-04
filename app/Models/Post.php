<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['name','price','type','solid_number','frozen_number','marketable_number','size','detail','status','category_id','color_id','user_id'];
    public function comments():HasMany
    {
        return $this->hasMany(Comment::class);
    }
    public function category():BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
    public function colors():BelongsToMany
    {
        return $this->belongsToMany(Color::class);
    }

    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    
}


