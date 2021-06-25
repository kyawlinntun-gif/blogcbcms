<?php

namespace App;

use App\Category;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /**
     * Post belongs to a category.
     *
     * @return void
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
