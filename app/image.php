<?php

namespace App;
use product;

use Illuminate\Database\Eloquent\Model;

class image extends Model
{
    
    public function product(){
     return	$this->belongsTo('\App\product','id','product_id');
    }

}
