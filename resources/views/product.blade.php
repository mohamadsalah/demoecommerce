@extends('layouts.app')

@section('content')
<div class="product-page">
<div class=" container-fluid">
    <nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/home">Home</a></li>
   
    <li class="breadcrumb-item"><a href="/products/{{$product->category}}">{{$product->category}}</a></li>
    <li class="breadcrumb-item"><a href="/products/{{$product->brand}}">{{$product->brand}}</a></li>
    <li class="breadcrumb-item active" aria-current="page">{{$product->name}}</li>
  </ol>
</nav>


<div  style="padding:0px;padding-top: 30px; overflow-x: hidden;">
  <div class="row" style="">
  	<div class="col-12">
  			<div class="row" style="text-align: left; margin: 4px;">
          <ul>
            <li style="display: inline-block; margin-left: 15px">
    		<div class="  product-buttons-col">
      			<div class="sellerdiv text-center">
      			<a href="/profile/{{$product->user()->first()->id}}" style="text-decoration: none;"> <img class="seller-img" src="{{$product->user()->first()->profile_picture}}" width="40" height="40">      			<span class="seller-name-span"> {{$product->user()->first()->name}}</span></a></div>
      		</div>
        </li>
</ul>
        </div>
  	</div>
    <div class="col-md-6 col-12" style="justify-content: center;overflow: hidden;">
      <div class="row container-fluid" style="margin: auto;">
      	<!-- here the small images of the product -->
      	<div class="col-md-1 col-12" style=" margin: 0px;padding: 0px">
      		<div class="row" style="padding-top: 20px;padding-bottom: 15px" >
    
            @foreach($product->image()->get() as $image)

      			<div class="col-md-12 col-2" style=" cursor:pointer;margin-top: 10px;
 ">
      				<img class="producsmallimg {{$loop->index+1}}"
      				onclick="change_main_image(this)" src="{{asset('images/products').'/'.$product->category.'/'.$product->brand.'/'.$product->id.'/'.$image->name}}" width="100%" height="100%" >
      			</div>
            @endforeach
      		</div>
      	</div>
      	<!-- here the big image -->
      	<div class="col-md-10 col-12" id="bimgdiv" style="overflow: hidden;max-height:550px;  padding: 0px; position: relative; padding: 10px;">

<div class="img-zoom-container" style="width: 100%; cursor:pointer;max-height: 100%; ">
  <img id="myimage" class="myimage" style="cursor:pointer; object-fit:scale-down;" src="{{asset('images/products').'/'.$product->category.'/'.$product->brand.'/'.$product->id.'/'.$product->image()->first()->name}}" width="100%" height="300" style="">
  
</div>
@can('delete',$product)
<div class="sold-div">
  <form action="/product/{{$product->id}}" method="POST">
       <input type="hidden" name="_method" value="DELETE">
     <input type="hidden" name="_token" value="{{ csrf_token() }}">
     <button class="btn btn-outline-dangar" type="submit">
     <i  class=" far fa-check-circle" style="color:#0bf10b;font-size:18px;">
     </i> Sold
     </button>
</form>
</div>
@endcan
@can('forceDelete',$product)
<div style="position: absolute;top: 40px;right: 0px">
    <form action="/product/drop/{{$product->id}}" method="POST">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <input type="submit" class="btn btn-danger" style="background-color: transparent;color: red" value="DELETE"/>
    </form>
</div>
@endcan
      		
      	</div>
      	
      </div>

 
<div class="row container">
  <script type="text/javascript">localStorage.setItem('uid',{{$product->user()->first()->id}})</script>
  <form action="/product/report/{{$product->id}}" method="POST" style="min-width: 70%;margin: auto;display: block;">
<input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="input-group mb-3">
  <input type="input" name="describtion"  class="form-control" placeholder="Whats the wrong thing?">

  <div class="input-group-append">
    <select class="custom-select form-control" name="report" style="overflow: scroll;">
  <option value="price">price</option>
  <option value="name">name</option>
  <option value="location">location</option>
  <option value="images">images</option>
  <option value="model">model</option>
  <option value="category">brand</option>
  </select>
    <button class="btn btn-outline-secondary" type="submit"  id="button-addon2">Report</button>
  </div>
           </div>

</form>
</div>



    </div>
    <div class="col-md-6 col-12" style="text-align: center;">
    	<div class="col-md-6 col-12 container product-details">
              	<div style="padding: 15px;" class="" >
              		<h1>{{$product->name}} </h1>
              	</div>
              	<div style="margin: 15px">
              		  ${{$product->price}}
              	</div>
              	<div style="margin: 15px">
              		  {{$product->category}}
              	</div>
              	<div style="margin: 15px">
              	     location:{{$product->location}}
              	</div>
              	<div style="margin: 15px">
                    {{$product->describtion}}
              	</div>
              	<div style="margin: 15px">
                <div class="sellerdiv text-center">
                    <a href="/profile/{{$product->user()->first()->id}}" style="text-decoration: none;">
                      <img class="seller-img" src="{{$product->user()->first()->profile_picture}}" width="40" height="40">
                        <span class="seller-name-span">
                         {{$product->user()->first()->name}}
                        </span>
                    </a>
                    </div>
    	         </div>
      </div> 
      <div class="col-md-6 col-12" style="padding: 10px;">
        <div>similar products</div>
        <div class="row">
        @foreach($similar as $product )
        <div class="col-12" style="padding: 12px;overflow: hidden;">
          <div style="box-shadow: 0px 1px 7px 1px rgba(127, 161, 162, 0.6);min-height: 100%;padding: 3px">
          <img  src="{{asset('1.jpg')}}" height="100" style="float: left;width: auto;padding: 4px">
          <strong style="margin-left: 10px;">Name: {{$product->name}}</strong>
          
          <small style="margin-left: 10px;" >Price: {{ $product->price}} $</small>
          <small style="margin-left: 10px;" >Location:{{ $product->location}}</small>
          <small style="margin-left: 10px; float: right;" ><a href="/product/{{$product->id}}">view</a></small>
          <div style="padding-left: 10px; overflow: hidden;"><small>this peoduct been reported {{ $product->report}} time/s</small> </div>
          </div>
        </div>
        @endforeach
        </div>

        
      </div>

      <div class="container-fluid resultcont" >
      	<div id="myresult" style="height: 300px;width:auto;object-fit:scale-down;" class="img-zoom-result">
      </div>
     
      </div>

    </div>
    
  </div>
  
</div>

</div>

</div>
@endsection