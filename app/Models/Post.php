<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use app\Models\Category;
use app\Models\Subcategory;
use app\Models\User;


class Post extends Model
{
    use HasFactory;
    protected $fillable = [
        'category_id', 'subcategory_id', 'title', 'slug', 'post_date', 'description', 'image',
    ];


    //__join with category__//
    function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

      //__join with subcategory__//
      function subcategory()
      {
          return $this->belongsTo(Subcategory::class, 'subcategory_id');
      }

        //__join with user__//
    function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
