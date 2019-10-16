<?php
namespace App\Http\Repositories;
use App\Http\Interfaces\ProductRepositoryInterface;
use App\product;
 /**
  * 
  */
 class ProductRepository implements ProductRepositoryInterface

 {
 	
 	public function getCategory($cat){
 		return product::where('category','=',$cat)->where('approve','=','1')->orderby('created_at')->limit(10)->get();

 	}
 }