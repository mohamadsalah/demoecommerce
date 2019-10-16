
<body>
  <div class="header-page">
<div class="header text-center" style="display: inline-block;">
    <div>
      <div class="header-left">
        <ul>
          <li>
            <a href="/home">BuySell</a>
          </li>
          
        </ul>
        <ul>
          <li>
            <a class="btn btn-outline-danger" href="/product/create">
            <i class="fas fa-upload" style="color: #89bd4d;font-size: 20px;"></i></a>
          </li>
        </ul>
      </div>

      <div class="header-right">
          <ul>




            <li class="search-li">
              <button class="btn btn-outline-danger" style="height: 100%;margin: auto;border: 0px;">
                <i class="fas fa-search "  style="color: white;font-size:22px; "></i>
              </button>  
                 <div class="row bet-div"></div>
                  <div class="search-div">
                    <div class="row">
                      <div class="col">
                       <form>
                            <input id="search-input" class="form-control" style="width: 100%;font-size: 
                            15px;box-shadow:0px 3px 9px 1px rgba(245, 247, 149, 0.98);" type="text" name="searchKey" placeholder=" Write search keyword" required> 
                                <div id="search-resault" class="search-resault"  style="width: 100%">
                                  <table class="table table-hover "  style="max-width: 100%">
                                    <thead>
                                      <tr>
                                        <th>Name</th>
                                        <th>Location</th>
                                        <th>Price</th>
                                        <th>Category</th>
                                      </tr>
                                    </thead>
                                    <tbody id="searchtbody">
                                    </tbody>
                                  </table>
                                </div>
                            <button type="submit">
                              <i class="fas fa-search"></i>
                            </button>
                    </form>
                   </div>
                </div>
              </div>
            </li>






            @auth
            <li class="notification-li">
                  <i id="noti-icon" class="fas fa-bell text-shadow btn btn-outline-success"  style="border: 0px"></i>
                        <sup style="left:-.5em;top:-1em;">
                          <strong>{{Auth::user()->unreadNotifications()->count()}}</strong>
                        </sup>
                  <div class="row bet-div"></div>
                  <div class="notification-div">
                    <div class="row">
                      <div class="col" id="notitbody">
                      </div>
                    
                          @foreach(Auth::user()->unreadNotifications()->take(5)->get() as $notification)
    


                               <div  class=" col-12 alert text-center alert-success alert-dismissible show" role="alert"> You have a reported product (
                                 {{$notification->data['type']}} )     <a href="product/{{$notification->data['product_id']}}">view</a>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>

                          
                         
                          @endforeach
                    
                    </div> 
                  </div>
            </li>

            <li class="big-profile">  
                    <a href="{{ route('logout') }}" style="font-size: 12px">Log out</a>
            </li>
            <li class="big-profile">
                <a href="/profile/{{Auth::user()->id}}">
                  <img width="25px" height="auto" style="border-radius: 50%" src="{{Auth::user()->profile_picture}}"> 
                  </a>
            </li>
            <li class="small-profile ">
              <i class="fas fa-bars text-shadow btn btn-outline-success" style="color: #fdda31;"></i>
                  <div class="row bet-div"></div>
                  <div class="profile-dropdown">
                    <div class="row">
                      <div class="col">
                        <a href="/profile/{{Auth::user()->id}}">
                          <img width="25px" height="auto" style="border-radius: 50%" src="{{Auth::user()->profile_picture}}">
                          <small>{{Auth::user()->name}}</small>
                        </a>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col">
                         <a href="{{ route('logout') }}" style="font-size: 12px">Log out</a>
                      </div>
                    </div> 
                  </div>
            </li>

            @endauth
            @guest
            <li class="normal-login-link">
              <a href="/login">LOG IN</a>
            </li>
            <li class="normal-login-link">
              <a href="/register">SIGN UP</a>
            </li>
            <li class="icon-login">
              <a href="/login">
              <i class="fas fa-user text-shadow" style="color:green;font-size: 20px;"></i></a>
            </li>
            @endguest
          </ul>


            


      </div>
    </div>

    
  </div>
<div style="position: fixed; top:35px;width: 100%;z-index:1029;background-color: white;">
<div   style="position: relative; justify-content: center; padding: 10px;padding-top: 15px;background-color:#fffdf9;">
<ul  id="header-catecories" class="header-catecories text-center" style="white-space: nowrap; overflow-x: auto;" >
  <li  style="white-space: nowrap;"> <a href="{{ url('home') }}">Home</a></li>
   <li class="cars-link" style="white-space: nowrap;">
    
    <a  href="{{ url('products/cars') }}"> Cars </a>
        <div class="cars-div popover-category-div">
          <div class="container" style="background-color: white;height: 100%;padding-top: 20px">
            <div class="row" style="  box-shadow: 1px 0 5px -4px rgba(0, 0,0, 1), -1px 0 4px -5px rgba(0,0,0,1);">
            <div class="col-2 brands-part">
              <span class="text-center">Brands</span>
                                        

                 <a href="{{ url('products/cars/bmw') }}"> BMW</a>
                 <a href="{{ url('products/cars/toyota') }}"> TOYOTA</a>
                 <a href="{{ url('products/cars/merceds') }}"> Merceds</a>
                 <a href="{{ url('products/cars/renault') }}"> Renault</a>
                 <a href="{{ url('products/cars/kia') }}"> KIA</a>
                 <a href="{{ url('products/cars/nissan') }}"> Nissan</a>
                 <a href="{{ url('products/cars/audi') }}"> Audi</a>



                 
                    
            </div>
            <div class=" col-5 popular-brands-part">
              <span class="text-center">Category most popular brands</span>
            <div class="row" class="popular-brands">
              <div class="col-4">
                <a href="products/cars/bmw"><img class="popular-brand-img"  src="{{asset('images/bmw.jpg')}}"> </a>
                
              </div>
              <div class="col-4">
                <a href="{{ url('products/cars/merceds') }}"><img class="popular-brand-img"  src="{{asset('images/mer.jpg')}}"> </a>
                
              </div>
              <div class="col-4">
                <a href="{{ url('products/cars/audi') }}"><img  class="popular-brand-img" src="{{asset('images/audi.jpg')}}" > </a>
                
              </div>
              <div class="col-4">
                <a href="products/cars/toyota"><img class="popular-brand-img"  src="{{asset('images/moto.jpg')}}"> </a>
                
              </div>
              <div class="col-4">
                <a href="products/cars/honda"><img class="popular-brand-img"  src="{{asset('images/huawei.jpg')}}"> </a>
                
              </div>
              <div class="col-4">
                <a href="products/cars/nissan"><img  class="popular-brand-img" src="{{asset('images/lg.jpg')}}" > </a>
                
              </div>
              <div class="col-4">
                <a href="products/cars/kia"><img class="popular-brand-img"  src="{{asset('images/moto.jpg')}}"> </a>
                
              </div>
              <div class="col-4">
                <a href="products/cars/renault"><img class="popular-brand-img"  src="{{asset('images/huawei.jpg')}}"> </a>
                
              </div>
              <div class="col-4">
                <a href="products/cars/audi
                "><img  class="popular-brand-img" src="{{asset('images/lg.jpg')}}" > </a>
                
              </div>
            </div>
            </div>
            <div class=" col-5 category-image">
              <p></p>
            </div>
            </div>
            
          </div>
  
        </div> 
   </li>
     <li class="mobiles-link" style="white-space: nowrap;" >   
           <a href="{{ url('products/mobiles') }}">Mobiles</a>
        <div  id="mobiles-div" class="mobiles-div d popover-category-div">
          <div class="container" style="background-color: white;height: 100%;padding-top: 20px">
            <div class="row" style="  box-shadow: 1px 0 5px -4px rgba(0, 0,0, 1), -1px 0 4px -5px rgba(0,0,0,1);">
            <div class="col-2 brands-part">
              <span class="text-center">Brands</span>
                                        

                 <a href="{{ url('products/mobiles/sony') }}"> Sony</a>
                 <a href="{{ url('products/mobiles/iphone') }}"> iphone</a>
                 <a href="{{ url('products/mobiles/samsung') }}"> Samsung</a>
                 <a href="{{ url('products/mobiles/lg') }}">LG</a>
                 <a href="{{ url('products/mobiles/htc') }}"> HTC</a>
                 <a href="{{ url('products/mobiles/nokia') }}"> Nokia</a>
                 <a href="{{ url('products/mobiles/huawei') }}"> Huawi</a>



                 
                    
            </div>
            <div class=" col-5 popular-brands-part">
              <span class="text-center">Category most popular brands</span>
            <div class="row">
              <div class="col-4">
                <a href="/products/mobiles/sony"><img class="popular-brand-img"  src="{{asset('images/bmw.jpg')}}"> </a>
                
              </div>
              <div class="col-4">
                <a href="/products/mobiles/iphone"><img class="popular-brand-img"  src="{{asset('images/mer.jpg')}}"> </a>
                
              </div>
              <div class="col-4">
                <a href="/products/mobiles/lg
                "><img  class="popular-brand-img" src="{{asset('images/audi.jpg')}}" > </a>
                
              </div>
              <div class="col-4">
                <a href="/products/mobiles/nokia"><img class="popular-brand-img"  src="{{asset('images/moto.jpg')}}"> </a>
                
              </div>
              <div class="col-4">
                <a href="/products/mobiles/samsung"><img class="popular-brand-img"  src="{{asset('images/huawei.jpg')}}"> </a>
                
              </div>
              <div class="col-4">
                <a href="/products/mobiles/huawei"><img  class="popular-brand-img" src="{{asset('images/lg.jpg')}}" > </a>
                
              </div>
              <div class="col-4">
                <a href="/products/mobiles/htc"><img class="popular-brand-img"  src="{{asset('images/moto.jpg')}}"> </a>
                
              </div>
            </div>
            </div>
            <div class=" col-5 category-image">
              <p></p>
            </div>
            </div>
            
          </div>
  
        </div> 

   </li>
     <li class="computers-link" style="white-space: nowrap;">
    
     <a  href="{{ url('products/computers') }}"> Computers </a>
        <div class="computers-div d popover-category-div">
          <div class="container" style="background-color: white;height: 100%;padding-top: 20px">
            <div class="row" style="  box-shadow: 1px 0 5px -4px rgba(0, 0,0, 1), -1px 0 4px -5px rgba(0,0,0,1);">
            <div class="col-2 brands-part">
              <span class="text-center">Brands</span>
                                        

                 <a href="/products/computers/dell"> DELL</a>
                 <a href="/products/computers/apple"> Apple</a>
                 <a href="/products/computers/hp"> HP</a>
                 <a href="/products/computers/sony"> Sony</a>
                 <a href="/products/computers/toshiba"> TOSHIBA</a>
                 <a href="/products/computers/lenovo"> Lenovo</a>
                 <a href="/products/computers/samsung"> Samsung</a>



                 
                    
            </div>
            <div class=" col-5 popular-brands-part">
              <span class="text-center">Category most popular brands</span>
            <div class="row">
              <div class="col-4">
                <a href="/products/computers/dell"><img class="popular-brand-img"  src="{{asset('images/bmw.jpg')}}"> </a>
                
              </div>
              <div class="col-4">
                <a href="/products/computers/hp"><img class="popular-brand-img"  src="{{asset('images/mer.jpg')}}"> </a>
                
              </div>
              <div class="col-4">
                <a href="/products/computers/apple"><img  class="popular-brand-img" src="{{asset('images/audi.jpg')}}" > </a>
                
              </div>
              <div class="col-4">
                <a href="/products/computers/samsung"><img class="popular-brand-img"  src="{{asset('images/moto.jpg')}}"> </a>
                
              </div>
              <div class="col-4">
                <a href="/products/computers/lg"><img class="popular-brand-img"  src="{{asset('images/huawei.jpg')}}"> </a>
                
              </div>
              <div class="col-4">
                <a href="/products/computers//products/computers/lenovo"><img  class="popular-brand-img" src="{{asset('images/lg.jpg')}}" > </a>
                
              </div>
              <div class="col-4">
                <a href="/products/computers/sony"><img class="popular-brand-img"  src="{{asset('images/moto.jpg')}}"> </a>
                
              </div>
            </div>
            </div>
            <div class=" col-5 category-image">
              <p></p>
            </div>
            </div>
            
          </div>
  
        </div> 
   </li>
     <li class="home-link" style="white-space: nowrap;">
     
<a  href="{{ url('products/home') }}">Home & Electrics</a>
        <div class="home-div d popover-category-div">
          <div class="container" style="background-color: white;height: 100%;padding-top: 20px">
            <div class="row" style="  box-shadow: 1px 0 5px -4px rgba(0, 0,0, 1), -1px 0 4px -5px rgba(0,0,0,1);">
            <div class="col-2 brands-part">
              <span class="text-center">Brands</span>
                                        

                 <a href="/products/home/tv
"> TV</a>
                 <a href="
/products/home/microwave
"> microwave</a>
                 <a href="
/products/home/oveans
"> oveans</a>
                 <a href="
/products/home/tools
"> tools and equipments </a>
                 <a href="
/products/home/kitchen
"> kitchen parts</a>
                 <a href="
/products/home/furnitures
">furnitures</a>
                 <a href="

/products/home/lights"> lights</a>



                 
                    
            </div>
            <div class=" col-5 popular-brands-part">
              <span class="text-center">Category most popular brands</span>
            <div class="row">
              <div class="col-4">
                <a href="/products/home/tv"><img class="popular-brand-img"  src="{{asset('images/bmw.jpg')}}"> </a>
                
              </div>
              <div class="col-4">
                <a href="
/products/home/microwave
"><img class="popular-brand-img"  src="{{asset('images/mer.jpg')}}"> </a>
                
              </div>
              <div class="col-4">
                <a href="
/products/home/oveans
"><img  class="popular-brand-img" src="{{asset('images/audi.jpg')}}" > </a>
                
              </div>
              <div class="col-4">
                <a href="
/products/home/tools
"><img class="popular-brand-img"  src="{{asset('images/moto.jpg')}}"> </a>
                
              </div>
              <div class="col-4">
                <a href="
/products/home/kitchen
"><img class="popular-brand-img"  src="{{asset('images/huawei.jpg')}}"> </a>
                
              </div>
              <div class="col-4">
                <a href="
/products/home/furnitures
"><img  class="popular-brand-img" src="{{asset('images/lg.jpg')}}" > </a>
                
              </div>
              <div class="col-4">
                <a href="
/products/home/lights"><img class="popular-brand-img"  src="{{asset('images/moto.jpg')}}"> </a>
                
              </div>
              <div class="col-4">
                <a href=""><img class="popular-brand-img"  src="{{asset('images/huawei.jpg')}}"> </a>
                
              </div>
              <div class="col-4">
                <a href=""><img  class="popular-brand-img" src="{{asset('images/lg.jpg')}}" > </a>
                
              </div>
            </div>
            </div>
            <div class=" col-5 category-image">
              <p></p>
            </div>
            </div>
            
          </div>
  
        </div> 


   </li>
     <li class="clothes-link" style="white-space: nowrap;">
    

<a  href="{{ url('products/clothes') }}"> Clothes & Sports </a>
        <div class="clothes-div d popover-category-div">
          <div class="container" style="background-color: white;height: 100%;padding-top: 20px">
            <div class="row">
            <div class="col-2 brands-part">
              <span class="text-center">Brands</span>
                                        

                 <a href="products/clothes/nike"> Nike</a>
                 <a href="products/clothes/adiddas"> Adiddas</a>
                 <a href="products/clothes/ravin"> Ravin</a>
                 <a href="products/clothes/swimming"> swimming</a>
                 <a href="products/clothes/football"> football</a>
                 <a href="products/clothes/gym"> gym</a>
                 <a href="products/clothes/tennis"> tennis</a>



                 
                    
            </div>
            <div class=" col-5 popular-brands-part">
              <span class="text-center">Category most popular brands</span>
            <div class="row">
              <div class="col-4">
                <a href="products/clothes/nike"><img class="popular-brand-img"  src="{{asset('images/bmw.jpg')}}"> </a>
                
              </div>
              <div class="col-4">
                <a href="products/clothes/adiddas"><img class="popular-brand-img"  src="{{asset('images/mer.jpg')}}"> </a>
                
              </div>
              <div class="col-4">
                <a href="products/clothes/ravin"><img  class="popular-brand-img" src="{{asset('images/audi.jpg')}}" > </a>
                
              </div>
              <div class="col-4">
                <a href="products/clothes/gym"><img class="popular-brand-img"  src="{{asset('images/moto.jpg')}}"> </a>
                
              </div>
              <div class="col-4">
                <a href="products/clothes/tennis"><img class="popular-brand-img"  src="{{asset('images/huawei.jpg')}}"> </a>
                
              </div>
              <div class="col-4">
                <a href="townteam"><img  class="popular-brand-img" src="{{asset('images/lg.jpg')}}" > </a>
                
              </div>
              <div class="col-4">
                <a href=""><img class="popular-brand-img"  src="{{asset('images/moto.jpg')}}"> </a>
                
              </div>
            
            </div>
            </div>
            <div class=" col-5 category-image">
              <p></p>
            </div>
            </div>
            
          </div>
  
        </div> 

   </li>
   
     <li class="buldings-link" style="white-space: nowrap;">
    <a  href="{{ url('products/buldings') }}">Buldings & Properties </a>
        <div class="buldings-div d popover-category-div">
          <div class="container" style="background-color: white;height: 100%;padding-top: 20px">
            <div class="row" style="  box-shadow: 1px 0 5px -4px rgba(0, 0,0, 1), -1px 0 4px -5px rgba(0,0,0,1);">
            <div class="col-2 brands-part">
              <span class="text-center">Brands</span>
                                        

                 <a href="/products/buldings/shop"> Shop</a>
                 <a href="/products/buldings/house"> House</a>
                 <a href="/products/buldings/flat"> Flat</a>
                 <a href="/products/buldings/farm"> Farm</a>
                 <a href="/products/buldings/land">
                   land
                 </a>
                 <a href="/products/buldings/garden"> garden</a>
                 



                 
                    
            </div>
            <div class=" col-5 popular-brands-part">
              <span class="text-center">Category most popular brands</span>
            <div class="row">
              <div class="col-4">
                <a href="/products/buldings/shop"><img class="popular-brand-img"  src="{{asset('images/bmw.jpg')}}"> </a>
                
              </div>
              <div class="col-4">
                <a href="/products/buldings/house"><img class="popular-brand-img"  src="{{asset('images/mer.jpg')}}"> </a>
                
              </div>
              <div class="col-4">
                <a href="/products/buldings/flat"><img  class="popular-brand-img" src="{{asset('images/audi.jpg')}}" > </a>
                
              </div>
              <div class="col-4">
                <a href="/products/buldings/land"><img class="popular-brand-img"  src="{{asset('images/moto.jpg')}}"> </a>
                
              </div>
              <div class="col-4">
                <a href="/products/buldings/garden"><img class="popular-brand-img"  src="{{asset('images/huawei.jpg')}}"> </a>
                
              </div>
              <div class="col-4">
                <a href="/products/buldings/farm"><img  class="popular-brand-img" src="{{asset('images/lg.jpg')}}" > </a>
                
              </div>
             
            </div>
            </div>
            <div class=" col-5 category-image">
              <p></p>
            </div>
            </div>
            
          </div>
  
        </div> 
   </li>
</ul>

</div>

</div>

  
</div>



</div>


@if (session()->has('success'))
        <div style="position: fixed;z-index: 99999;width: 100%; top: 200px" class="alert text-center alert-success alert-dismissible show" role="alert">
  <strong>Congrats </strong> {{session()->pull('success')}}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif
@if (session()->has('fail'))
   <div style="position: fixed;z-index: 99999;width: 100%; top: 200px" class="alert text-center alert-danger alert-dismissible show" role="alert">
  <strong>Sorry </strong> {{ session()->pull('fail') }}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif