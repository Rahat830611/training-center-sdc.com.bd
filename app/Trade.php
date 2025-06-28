<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trade extends Model
{
    protected $guarded = [];
    protected $table = 'trades';
    public function course()
    {
        return $this->belongsTo('App\Category','trade_course'); 
    }
}
