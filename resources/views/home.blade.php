@extends('layouts.app')

@section('content')
 <div class="home-page">
  <div class="container-fluid carasoul-container" style="width: 100%;padding: 0px; height:400px;overflow: hidden; ">
    <div id="demo" class="carousel slide" data-ride="carousel" style="max-width: 100%;max-height: 100%;">
  <div class="carousel-inner">
    <div class="carousel-item active" style="position: relative;">
      <img src="{{asset('huawi.jpg')}}" style="width: 100%;max-height: 100%" alt="Los Angeles"  >
         <div style="position: absolute;top:10%;left: 10%;color:black">
       <h2 class="carasoul-header">Your moments deserve to be captured</h2>
       <p class="text-center"> find a suitable phone right now</p>
        <div class="carasoul-div">
       <a class="btn carasoul-link"href="">merceds cars</a> 
        <a class="btn"  href="">B M W</a> 
        <a class="btn"href="">Toyota</a>
        <a class="btn" href="">Honda</a> 
        <br>
        <a class="btn"  href="">Last added cars</a> 
        <a class="btn"  href="">All</a>  
        </div>
      </div>
    </div>
    <div class="carousel-item" style="position: relative;">
      <img src="{{asset('merceds.jpg')}}" style="max-width: 100%;max-height: 100%" alt="Los Angeles"  >
             <div style="position: absolute;top:10%;left: 10%;color:black">
       <h2 class="carasoul-header">your ammazing life miss the ammazing car</h2>
       <p class="text-center"> find the ammazing suitable car right now</p>
       <div class="carasoul-div">
       <a class="btn carasoul-link"href="">merceds cars</a> 
        <a class="btn"  href="">B M W</a> 
        <a class="btn"href="">Toyota</a>
        <a class="btn" href="">Honda</a> 
        <br>
        <a class="btn"  href="">Last added cars</a> 
        <a class="btn"  href="">All</a>  
        </div>
      </div>
    
    </div>
    <div class="carousel-item" style="position: relative;">
             <div style="position: absolute;top:10%;left: 10%;color:white">
       <h2 class="carasoul-header">your ammazing life miss the ammazing car</h2>
       <p class="text-center"> find the ammazing suitable car right now</p>
       <div class="carasoul-div">
       <a class="btn carasoul-link"href="">merceds cars</a> 
        <a class="btn"  href="">B M W</a> 
        <a class="btn"href="">Toyota</a>
        <a class="btn" href="">Honda</a> 
        <br>
        <a class="btn"  href="">Last added cars</a> 
        <a class="btn"  href="">All</a>  
        </div> 
      </div>
     
      <img src="{{asset('alien.PNG')}}" style="width: 100%;max-height: 100%" alt="Los Angeles"  >
    </div>
  </div>
  
  <!-- Left and right controls -->
  <a class="carousel-control-prev" href="#demo" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </a>
  <a class="carousel-control-next" href="#demo" data-slide="next">
    <span class="carousel-control-next-icon"></span>
  </a>
</div>
  </div>





<div class="container-fluid sliders-container" style="overflow: hidden;">


<div class="slider" >
      <div style="min-width: 100%;margin-bottom:10px">
    <h2 class="slider-header">Cars</h2>
    <span class="slider-seeall"> <a href="{{ url('product/mobiles') }}"> All  <i  style="font-size: 17px;color:green" class="fas fa-hand-point-right" ></i></a></span>
    <div style="clear: both;"></div>
  </div>
  <div id="mobiles-row" class="container products-row" style="overflow: auto; min-width: 100%;white-space: nowrap;">


 <div class="left-arrow" id="car_slide-left" 
 onclick="scroll_Left(this.id)"  style=""> 
<button class="mobiles-left-button" style=" width: 100%;height: 100%;background-color: transparent;border:0px;outline: 0px">
  <i class="fas fa-angle-left"></i>
</button> </div>



<div class="right-arrow" id="mobile_slide-right" onclick="scroll_right(this.id)" style="padding: 0px"> 
<button class="mobiles-right-button" style="width: 100%;height: 100%;background-color: transparent;border:0px;outline: 0px"><i class="fas fa-angle-right"></i></button> </div>

@foreach($cars as $product)
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
      </div>
    </div>
</div>

</a>
  @endforeach
  </div>
</div>



<div class="slider" >
      <div style="min-width: 100%;margin-bottom:20px">
    <h2 class="slider-header">Mobiles</h2>
    <span class="slider-seeall"> <a href="{{ url('product
    /mobiles') }}">All  <i  style="font-size: 17px;color:green" class="fas fa-hand-point-right" ></i></a></span>
    <div style="clear: both;"></div>
  </div>
  <div id="mobiles-row" class="container products-row" style="overflow: auto; min-width: 100%;white-space: nowrap;">


 <div class="left-arrow" id="car_slide-left" 
 onclick="scroll_Left(this.id)"  style=""> 
<button class="mobiles-left-button" style=" width: 100%;height: 100%;background-color: transparent;border:0px;outline: 0px">
  <i class="fas fa-angle-left"></i>
</button> </div>



<div class="right-arrow" id="mobile_slide-right" onclick="scroll_right(this.id)" style="padding: 0px"> 
<button class="mobiles-right-button" style="width: 100%;height: 100%;background-color: transparent;border:0px;outline: 0px"><i class="fas fa-angle-right"></i></button> </div>

@foreach($mobiles as $product)
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
      </div>
    </div>
</div>

</a>
  @endforeach
  </div>
</div>



<div class="slider" >
      <div style="min-width: 100%;margin-bottom:20px">
    <h2 class="slider-header">Computers</h2>
    <span class="slider-seeall"> <a href="{{ url('product/computers') }}">All  <i  style="font-size: 17px;color:green" class="fas fa-hand-point-right" ></i></a></span>
    <div style="clear: both;"></div>
  </div>
  <div id="computers-row" class="container products-row" style="overflow: auto; min-width: 100%;white-space: nowrap;">


 <div class="left-arrow" id="car_slide-left" 
 onclick="scroll_Left(this.id)"  style=""> 
<button class="computers-left-button" style=" width: 100%;height: 100%;background-color: transparent;border:0px;outline: 0px">
  <i class="fas fa-angle-left"></i>
</button> </div>



<div class="right-arrow" id="mobile_slide-right" onclick="scroll_right(this.id)" style="padding: 0px"> 
<button class="mobiles-right-button" style="width: 100%;height: 100%;background-color: transparent;border:0px;outline: 0px"><i class="fas fa-angle-right"></i></button> </div>

@foreach($computers as $product)
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
      </div>
    </div>
</div>

</a>
  @endforeach
  </div>
</div>

<div class="slider" >
      <div style="min-width: 100%;margin-bottom:20px">
    <h2 class="slider-header">Clothes & Sports</h2>
    <span class="slider-seeall"> <a href="{{ url('product/clothes') }}"> All  <i  style="font-size: 17px;color:green" class="fas fa-hand-point-right" ></i></a></span>
    <div style="clear: both;"></div>
  </div>
  <div id="clothes-row" class="container products-row" style="overflow: auto; min-width: 100%;white-space: nowrap;">


 <div class="left-arrow" id="car_slide-left" 
 onclick="scroll_Left(this.id)"  style=""> 
<button class="clothes-left-button" style=" width: 100%;height: 100%;background-color: transparent;border:0px;outline: 0px">
  <i class="fas fa-angle-left"></i>
</button> </div>



<div class="right-arrow" id="clothes_slide-right" onclick="scroll_right(this.id)" style="padding: 0px"> 
<button class="clothes-right-button" style="width: 100%;height: 100%;background-color: transparent;border:0px;outline: 0px"><i class="fas fa-angle-right"></i></button> </div>

@foreach($clothes as $product)
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
      </div>
    </div>
</div>

</a>
  @endforeach
  </div>
</div>
<div class="slider" >
      <div style="min-width: 100%;margin-bottom:20px">
    <h2 class="slider-header">Last added Buldings & Propertie</h2>
    <span class="slider-seeall"> <a href="{{ url('product/buldings') }}">All  <i  style="font-size: 17px;color:green" class="fas fa-hand-point-right" ></i></a></span>
    <div style="clear: both;"></div>
  </div>
  <div id="buldings-row" class="container products-row" style="overflow: auto; min-width: 100%;white-space: nowrap;">


 <div class="left-arrow" id="buldings_slide-left" 
 onclick="scroll_Left(this.id)"  style=""> 
<button class="buldings-left-button" style=" width: 100%;height: 100%;background-color: transparent;border:0px;outline: 0px">
  <i class="fas fa-angle-left"></i>
</button> </div>



<div class="right-arrow" id="buldings_slide-right" onclick="scroll_right(this.id)" style="padding: 0px"> 
<button class="buldings-right-button" style="width: 100%;height: 100%;background-color: transparent;border:0px;outline: 0px"><i class="fas fa-angle-right"></i></button> </div>

@foreach($buldings as $product)
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
      </div>
    </div>
</div>

</a>
  @endforeach
  </div>
</div>


<div class="slider" >
      <div style="min-width: 100%;margin-bottom:20px">
    <h2 class="slider-header"> Home & Electrics</h2>
    <span class="slider-seeall"> <a href="{{ url('product/home') }}">All  <i  style="font-size: 17px;color:green" class="fas fa-hand-point-right" ></i></a></span>
    <div style="clear: both;"></div>
  </div>
  <div id="home-row" class="container products-row" style="overflow: auto; min-width: 100%;white-space: nowrap;">


 <div class="left-arrow" id="car_slide-left" 
 onclick="scroll_Left(this.id)"  style=""> 
<button class="mobiles-left-button" style=" width: 100%;height: 100%;background-color: transparent;border:0px;outline: 0px">
  <i class="fas fa-angle-left"></i>
</button> </div>



<div class="right-arrow" id="mobile_slide-right" onclick="scroll_right(this.id)" style="padding: 0px"> 
<button class="mobiles-right-button" style="width: 100%;height: 100%;background-color: transparent;border:0px;outline: 0px"><i class="fas fa-angle-right"></i></button> </div>

@foreach($home as $product)
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
      </div>
    </div>
</div>

</a>
  @endforeach
  </div>
</div>
<div class="row">
@foreach($all as $product)
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
      </div>
    </div>
</div>

</a>
</div>
  @endforeach
</div>


</div>
</div>
@endsection
