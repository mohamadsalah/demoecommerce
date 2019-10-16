<?php

namespace App;
use Image;
use Illuminate\Database\Eloquent\Model;
use Storage;
use Illuminate\Database\Eloquent\SoftDeletes;
class prodimg extends Model
{
    //
use SoftDeletes;
    protected $table='images';
    protected $fillable = ['id',
'name',
'product_id'
    ];
    public function create($request,$id){
    	$this->product_id=$id;

    	for ($i=1; $i <7; $i++) { 
    	 if($request->hasfile('img'.$i))
         {
         	$image=$request->file('img'.$i);
            dump($image);
            $this->name=$image->getClientOriginalName();
            $path=public_path().'/images/products/'.$request->category.'/'.$request->brand.'/'.$id.'/';

                $image->move($path, $image->getClientOriginalName());
                 $this->save();
            
         }}
    	
    }
     public function product(){
     return $this->belongsTo('\App\product','product_id','id');
    }
}
