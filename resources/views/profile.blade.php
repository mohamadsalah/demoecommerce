@extends('layouts.app')

@section('content')
  <div class="profile-page">
 <div class="container-fluid" style="margin-top: 30px ">
  <div class="row" style="overflow-x: hidden;">
    <div class="col-lg-3" style=" " >
  <div class="card" >
    <div class="card-img-top profile-img-top "  >

<div class="profile-image" id="avatar" style="background-image:url({{$user->profile_picture}});" >
    @if (Auth::user()==$user)
 <form action="" method="GET"  enctype="multipart/form-data" id="avatarForm">
              {!! csrf_field() !!}<input type="file"  onchange="previewAvatar(this)" id="profile_picture" name="profile_picture" hidden >
  <div class="update-profile-image text-center"  onclick="updateAvatar()">
    <span class="update-span"><i class='fas fa-camera' style='font-size:24px'></i>
update</span>
 <button class="btn btn-outline-success" type="submit" id="submitAvatar"> Update</button>
  <input  name="" class="btn btn-outline-danger" id="cancelAvatar" placeholder="Cancel"> 
  </div>
 
</form>
@endif

</div>

          </div>
  <div class="card-body">
    <h5 class="card-title" style="text-align: center; color: #fd430bb8;">{{$user->name}}</h5>
    <p class="card-text">About:</p>
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item">From: </li>
    <li class="list-group-item">Email: {{$user->email}}</li>
    <li class="list-group-item">Phone: </li>
  </ul>
  <div class="card-body  text-center">
    @if (Auth::user()==$user)
<button class="btn btn-outline-success" data-toggle="collapse" data-target="#update-about">update informations</button>

<div id="update-about" class="collapse">
<ul class="list-group list-group-flush">
  <form name="update-profile"method="POST" action="/profile/{{$user->id}}">
    @method('PUT')
                        @csrf
<li class="list-group-item">name:  <input name="name"  class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }} form-control"  value="{{ old('name') }}" ></li>
  <li class="list-group-item text-center" >Abbout: <textarea name="about"  class="form-control{{ $errors->has('about') ? ' is-invalid' : '' }} form-control"  value="{{ old('about') }}"></textarea></li>
    <li class="list-group-item">From: <input name="from"  class="form-control{{ $errors->has('from') ? ' is-invalid' : '' }} form-control"  value="{{ old('from') }}" > </li>
    <li class="list-group-item">Phone:  <input name="phone"  class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }} form-control"  value="{{ old('phone') }}" ></li>
    <li class="list-group-item">Password:  <input name="password" class="form-control" type="password"></li>
    <li class="list-group-item">Confirm Password:  <input name="password2" class="form-control" type="password" ></li>
    <button class="btn btn-success" style="display: block;margin: auto;" type="submit">
      Update
    </button>
    </form>
  </ul>
</div>
    @endif
    
  </div>
</div>
    </div>


   <!-- products show starts here -->




  <div class="col-lg-8">
<div class="row">
  @foreach($products as $product)
    @php
$image = json_decode($product->image()->first('name'), true);
$name = $image['name'];
@endphp
     <div class="col-md-4 col" >    
  <a href="{{ url('product/'.$product->id) }}">

   <div class="product_new_div" style="width: 100%">
        @if($product->deleted_at)
    <div style="position: absolute; min-width: 100%;min-height: 100%;background-color: rgba(0,0,0,.7);">

      <span class="product-top-span"> SOLD<br></span>
    </div>
     @endif







    <img src="{{asset('/images/products'.'/'.$product->category.'/'.$product->brand.'/'.$product->id.'/'.$name 
    )}}" height="210" style="object-fit:scale-down;width: auto;display:block;
    margin:auto">
      <div class="product-overlytop-details text-center">
                          <span class="product-top-span">{{$product->name}}<br></span>
                          <span class="product-top-span">{{$product->price}} pounds<br></span>
                          <span class="product-top-span"> {{$product->location}}<br></span>
                      

                          
                          <button class="btn quick-look-button "data-toggle="modal" data-target="#myModal1">
                            Quick look
                           </button>
                           

                        </div>
  
  </div>
          </a>
          </div>
            @endforeach
</div>

    </div>

</div>


</div>
        
   </div>  
@endsection







