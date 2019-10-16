<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Storage;
use Illuminate\Database\Eloquent\SoftDeletes;
class proReport extends Model
{
  use SoftDeletes;
     protected $fillable = ['id',
'type',
'text',
'product_id'
    ];

public function create($request,$id){
	$this->product_id=$id;
	$this->type=$request->report;
	$this->text=$request->describtion;
	$this->save();

}

    public function product(){
     return $this->belongsTo('\App\product','product_id','id');
    }
}
