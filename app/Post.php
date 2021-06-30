<?php

namespace App;

use App\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{

    use SoftDeletes;

    protected $fillable = [
        'title', 'content', 'featured', 'category_id', 'slug'
    ];

    /**
     * Post belongs to a category.
     *
     * @return void
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function getFeaturedAttribute($value)
    {
        return asset($value);
    }
}
