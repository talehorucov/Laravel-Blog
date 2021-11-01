<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use Sluggable;
    use HasFactory;
    use SoftDeletes;
    protected $fillable = ['name', 'image', 'description'];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public function latest_post()
    {
        return $this->hasOne(Post::class)->latest();
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
