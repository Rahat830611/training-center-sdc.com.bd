<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChildCategory extends Model
{
    protected $guarded = [];
    public function connect_category()
    {
        return $this->belongsTo('App\Category','category_id');
    }
    public function connect_sub_category()
    {
        return $this->belongsTo('App\SubCategory','subcategory_id');
    }
}
