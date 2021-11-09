<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Star extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'post_id'
    ];

    public function post()
    {
        return $this->belongsTo(Post::class)->where('user_id',auth()->user()->id);
    }
}
