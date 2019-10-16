<?php
namespace App;
use Illuminate\Http\Request;
use Image;
use Auth;
use App\prodimg;
use App\User;
use App\proReport;
use File;
use Illuminate\Database\Eloquent\Model;
use App\Http\Requests\createProduct;

use Illuminate\Database\Eloquent\SoftDeletes;

class product extends Model
{
    use SoftDeletes;
    
    
    protected $table='products';

    protected $fillable = [
        'id','name', 'model', 'approve','category','price','modelname','location','describtion','user_id',
    ];

    public function image(){
     return	$this->hasMany('\App\prodimg','product_id','id');
    }
    public function report(){
     return $this->hasMany('\App\proReport','product_id','id');
    }
    
     public function user(){
        return $this->belongsTo('\App\User','user_id','id');
    }

    
    public function create(createProduct $request){
         
            	$path=public_path().'/images/products/'.$request->category.'/'.$request->brand;
                if(!File::exists($path)) {File::makeDirectory($path, 0777, true, true);}
            	$this->name=$request->input('name');
            	$this->category=$request->input('category');
            	$this->describtion=$request->input('describtion');
            	$this->price=$request->input('price');
            	$this->location=$request->input('location');
            	$this->year=$request->input('year');
            	$this->brand=$request->input('brand');
            	$this->user_id=Auth::user()->id;
            	$this->save();
                $id=$this->id;

                    	for ($i=1;$i<7; $i++) {
                        	 if($request->hasFile('img'.$i))
                             {
                                 	$imgprod=new prodimg();
                                 	$imgprod->product_id=$id;
                                 	$image=$request->file('img'.$i);
                                    $name=time().$image->getClientOriginalName();
                                    $imgprod->name=$name;
                                    $path=public_path().'/images/products/'.$request->category.'/'.$request->brand.'/'.$id.'/';
                                    $image->move($path,$name);
                                    $imgprod->save();
                             }
                           
                     }







    }
    public function createimgs(Request $request){

    }
}
