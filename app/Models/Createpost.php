<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Createpost extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'message',
        'image'

    ];

    protected $appends = ['userLiked'];


    function user() {

        return $this->belongsTo(User::class, 'user_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'post_id');
    }

    public function getUserLikedAttribute() {

        return $this->likes()->where("user_id", auth()->user()->id)->exists() ? true : false;

    }

    public function likes()
    {
        return $this->hasMany(Like::class, 'post_id');
    }

}

