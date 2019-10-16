@extends('layouts.app')

@section('content')
<div class="container">
 
          <h4>Sell your product</h4>
       
<form method="POST" action="{{ route('product.store') }}"  enctype="multipart/form-data">

  {{csrf_field()}}


      <div class="container" style="  background: white;
    font-family: 'Open Sans', sans-serif;">
@if ($errors->any())
@for($i=1;$i<7;$i++)
@if ($errors->has('img'.$i))
            <div class="alert alert-danger">
                <ul>
                        <li>{{ $errors->first('img'.$i) }}</li>
                </ul>

            </div>
 @endif
 @endfor
 @endif
    <div class="row " style=" margin:20px;padding: 20px ">
      <div class="col-12">
        <div>
          <label style="font-weight: bold;color: black;"> Upload images:
          	<sub>(1-6)</sub></label>
        </div>
      </div>

   <div class="col-6 col-md-2" data-wow-delay=".3s" style="overflow: hidden;margin-top: 20px">
        <div class="uplodimgdiv" id="img1c">
          <div  class="cir"   style="">
          </div>
          <div onclick="click_upload(this.id)" id="hid1" class="uploadedimg">
          </div>
          <input type="file" name="img1" onchange="readurl(this)" id="img1">
           <div id ="removimg1" onclick="removeSelectedImg(this.id)" class="removimg" >&times;</div>
          
        </div>
      </div>
         
   <div class="col-6 col-md-2" data-wow-delay=".3s" style="overflow: hidden;margin-top: 20px">
        <div class="uplodimgdiv" id="img2c">
          <div  class="cir"   style="">
          </div>
          <div onclick="click_upload(this.id)" id="hid2" class="uploadedimg">
          </div>
          <input type="file" name="img2" onchange="readurl(this)" id="img2">
           <div id ="removimg2" onclick="removeSelectedImg(this.id)" class="removimg" >&times;</div>
          
        </div>
      </div>
         <div class="col-6 col-md-2" data-wow-delay=".3s" style="overflow: hidden;margin-top: 20px">
        <div class="uplodimgdiv" id="img3c">
          <div  class="cir"   style="">
          </div>
          <div onclick="click_upload(this.id)" id="hid3" class="uploadedimg">
          </div>
          <input type="file" name="img3" onchange="readurl(this)" id="img3">
           <div id ="removimg2" onclick="removeSelectedImg(this.id)" class="removimg" >&times;</div>
          
        </div>
      </div>
         <div class="col-6 col-md-2" data-wow-delay=".3s" style="overflow: hidden;margin-top: 20px">
        <div class="uplodimgdiv" id="img4c">
          <div  class="cir"   style="">
          </div>
          <div onclick="click_upload(this.id)" id="hid4" class="uploadedimg">
          </div>
          <input type="file" name="img4" onchange="readurl(this)" id="img4">
           <div id ="removimg4" onclick="removeSelectedImg(this.id)" class="removimg" >&times;</div>
          
        </div>
      </div>
         <div class="col-6 col-md-2" data-wow-delay=".3s" style="overflow: hidden;margin-top: 20px">
        <div class="uplodimgdiv" id="img5c">
          <div  class="cir"   style="">
          </div>
          <div onclick="click_upload(this.id)" id="hid5" class="uploadedimg">
          </div>
          <input type="file" name="img5" onchange="readurl(this)" id="img5">
           <div id ="removimg5" onclick="removeSelectedImg(this.id)" class="removimg" >&times;</div>
          
        </div>
      </div>
         <div class="col-6 col-md-2" data-wow-delay=".3s" style="overflow: hidden;margin-top: 20px">
        <div class="uplodimgdiv" id="img6c">
          <div  class="cir"   style="">
          </div>
          <div onclick="click_upload(this.id)" id="hid6" class="uploadedimg">
          </div>
          <input type="file" name="img6" onchange="readurl(this)" id="img6">
           <div id ="removimg6" onclick="removeSelectedImg(this.id)" class="removimg" >&times;</div>
          
        </div>
      </div>
     

    </div>


<div class="row">
	<div class="col-md-6">

 <div class="form-group">
   <label  style="width: 100%; text-align: left;font-weight: bold;color: black;">Product name</label>
      <input class="form-control" style="width: 100%;" type="text" name="name" required> 
      @if ($errors->has('name'))
            <div class="alert alert-danger">
                <ul>
                        <li>{{ $errors->first('name') }}</li>
                </ul>

            </div>
 @endif
</div>

</div>
<div class="col-md-6">
<div class="form-group">
   <label  style="width: 100%; text-align: left;font-weight: bold;color: black;"> Product price:</label>

   <input class="form-control" style="width: 100%;" type="number" name="price" required>
@if ($errors->has('price'))
            <div class="alert alert-danger">
                <ul>
                        <li>{{ $errors->first('price') }}</li>
                </ul>

            </div>
 @endif
  
</div>
</div>

<div class="col-md-6">
  <div class="form-group">
   <label  style="width: 100%; text-align: left;font-weight: bold;color: black;"> Product category</label>
 <select id="category"class="custom-select" name="category" required>
    <option value="cars" selected>cars</option>
    <option value="mobiles">mobiles</option>
    <option value="computers">computers</option>
<option value="home">Home & electronics</option>
<option value="clothes">clothes & sports</option>
<option value="buldings">buldings & properities</option>

</select>
  
</div>
</div>

<div class="col-md-6">
  <div class="form-group">
   <label  style="width: 100%; text-align: left;font-weight: bold;color: black;"> Product brand</label>
   <select id="brand" class="custom-select" name="brand" required>
  "<option value='bmw'>bmw</option><option value='toyota'>toyota</option><option value='nissan'>nissan</option><option value='mercedes'>mercedes</option><option value='honda'>honda</option><option value='toyota'>toyota</option><option value='nissan'>nissan</option><option value='mercedes'>mercedes</option><option value='toyota'>toyota</option>
   

</select>
@if ($errors->has('brand'))
            <div class="alert alert-danger">
                <ul>
                        <li>{{ $errors->first('price') }}</li>
                </ul>

            </div>
 @endif
  


</div>
</div>



<div class="col-md-6">
<div class="form-group">
   <label  style="width: 100%; text-align: left;font-weight: bold;color: black;">Location</label>
      <input class="form-control" style="width: 100%;" type="text" max="2019" name="location" required> 
      @if ($errors->has('location'))
            <div class="alert alert-danger">
                <ul>
                        <li>{{ $errors->first('location') }}</li>
                </ul>

            </div>
 @endif
</div>
</div>

<div class="col-md-6">
<div class="form-group">
   <label  style="width: 100%; text-align: left;font-weight: bold;color: black;"> Product describtion:</label>
  <textarea class="form-control" name="describtion" required placeholder="describe your product"></textarea>
  @if ($errors->has('describtion'))
            <div class="alert alert-danger">
                <ul>
                        <li>{{ $errors->first('describtion') }}</li>
                </ul>

            </div>
 @endif
</div>
</div>

<div class="col-md-6">
<div class="form-group">
   <label  style="width: 100%; text-align: left;font-weight: bold;color: black;"> Product model year</label>
   <input class="form-control" style="width: 100%;" type="number"name="year" required> 
   @if ($errors->has('year'))
            <div class="alert alert-danger">
                <ul>
                        <li>{{ $errors->first('year') }}</li>
                </ul>

            </div>
 @endif
</div>
</div>

<div class="form-group">
   <label  style="width: 100%; text-align: left;font-weight: bold;color: black;"> Add</label>
<div class="col-md-6">
   <input type="submit" class="btn-secondary" placeholder="Sell">
</div>
</div>
      </div>



        
        
         
     
        
 


</div></form>
</div>

@endsection