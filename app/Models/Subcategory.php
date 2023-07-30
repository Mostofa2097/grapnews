<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    protected $fillable = [
      'category_id','subcategory_name','subcategory_slug',
    ];

    function category(){
        return $this->belongsTo(Category::class, 'category_id');
    }
}
