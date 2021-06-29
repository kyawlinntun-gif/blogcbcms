<?php

namespace App;

use App\Post;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    protected $fillable = [
        'name'
    ];

    /**
     * Category has many posts.
     *
     * @return void
     */
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
