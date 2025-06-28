<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = [];

    public function connect_category()
    {
        return $this->belongsTo('App\Category','category_id');
    }

    public function connect_subcategory()
    {
        return $this->belongsTo('App\SubCategory','subcategory_id');
    }
    public function connect_childcategory()
    {
        return $this->belongsTo('App\ChildCategory','childcategory_id');
    }
}
