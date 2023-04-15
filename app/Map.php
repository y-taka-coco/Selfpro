<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Map extends Model
{
    public function grade(){
        return $this->belongsTo("App\Grade","map_id","id");
    }
}
