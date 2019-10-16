@extends('layouts.app')

@section('content')
<div class="category-page">
<div class="container ">
  <nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/home">Home</a></li>
    @isset($brand)
    <li class="breadcrumb-item"><a href="/products/{{$cat}}">{{$cat}}</a></li>
    <li class="breadcrumb-item active" aria-current="page">{{$brand}}</li>
   @else
    <li class="breadcrumb-item active" aria-current="page">{{$cat}}</li>
    @endisset


  </ol>
</nav>
<div class="row" style="overflow: hidden;">

	@foreach($products as $product)
<div class="col-md-3 col-6">
    <a href="/product/{{$product->id}}">
          <div  class="product-div product_new_div">
            <img src="{{asset('/images/products/'.$product->category.'/'.$product->brand.'/'.$product->id.'/'.$product->image()->first()->name)}}">
              <div class="details text-center">
                <h3 >{{$product->name}}</h3>
                <div class="row">
                  <div class="col">
                    <span>{{$product->location}}</span>
                  </div>
                   <div class="col">
                     <span>{{$product->price}}</span>
                   </div>
                   <!-- <div class="col">
                     <a href="https://www.facebook.com/sharer/sharer.php?u={{asset('/product/$product->id')}}&display=popup"> share this </a>
                   </div> -->
                </div>
              </div>
          </div>
    </a>
</div>
            @endforeach
            @if($products->isEmpty())
       <div class="col">
        <div class="alert alert-danger text-center">
         Sorry  no products found
        </div>
       </div>
        @endif
</div>
</div>
</div>
@endsection