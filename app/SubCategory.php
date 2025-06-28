<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    protected $guarded = [];

    public function connect_category()
    {
        return $this->belongsTo('App\Category','category_id');
    }
}
