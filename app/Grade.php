<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    public function map(){
        return $this->belongsTo("App\Map","id","map_id");
    }
    
}
