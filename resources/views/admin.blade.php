@extends('layouts.app')

@section('content')

<div class="admin" style="overflow: hidden;">
	<div class="row">
		<ul style="width: 100%;color: red;" class="text-center">
			<li>
			<a href="#pended-products">PendedProducts</a>
			</li>

			<li>
				<a href="#reported-products">reportedProducts</a>
			</li>
			<li>
				<a href="#sold-products">sold-products</a>
			</li>
			<li>
				<a href="#bloced-users">bloced-users</a>
			</li>
		</ul>
	</div>
	<div class="row" style="margin: auto;">
		<div class="col-md-4  col-12 pended-products" id="pended-products">
			<div class="row">
				<div class="col-12">
				<h3>Pended products</h3>
				</div>
				@if($pended->isEmpty())
				<div class="col-12" style="padding: 12px;overflow: hidden;">
					<div class="alert alert-success" role="alert">
                         No pendedd products
                     </div>
				</div>
				@else
				@foreach($pended as $product )
				<div class="col-12 small-product-col">
					<div  class="small-product-div">
						<img src="{{asset('/images/products/'.$product->category.'/'.$product->brand.'/'.$product->id.'/'.$product->image()->first()->name)}}">
						<strong>{{$product->name}}</strong>
						 
						<small  >{{$product->price}}</small>
						<small >{{$product->location}}</small>
						<div class="text-center">
							<ul class="text-center">
								<li>
									<a class="btn btn-outline-success" href="/admin/approve/{{$product->id}}">approve</a>
								</li>

								<li>
									<a class="btn btn-outline-success" href="/product/{{$product->id}}">view</a>
								</li>
							</ul>
						</div>
						
						<div class="text-center">
							<small>{{$product->describtion}}</small>
					    </div>
					</div>
				</div>
				@endforeach
				@endif
			</div>
		</div>
		<div class="col-md-4 col-12 reported-products" id="reported-products">
			<div class="row">
				<div class="col-12">
				<h3>Reported products</h3>
				</div>
				@if($reported->isEmpty())
				<div class="col-12" style="padding: 12px;overflow: hidden;">
					<div class="alert alert-success" role="alert">
                         No reported products
                     </div>
				</div>
				@else
				@foreach($reported as $product )
				<div class="col-12 small-product-col">
					<div  class="small-product-div">
						<img src="{{asset('/images/products/'.$product->category.'/'.$product->brand.'/'.$product->id.'/'.$product->image()->first()->name)}}">
						<strong>{{$product->name}}</strong>
						 
						<small  >price</small>
						<small >{{$product->location}}</small>
						<div class="text-center">
							<ul class="text-center">
								<li>
									<a class="btn btn-outline-success" href="/admin/pinProduct/{{$product->id}}">pin</a>
								</li>
								
								<li>
									<a class="btn btn-outline-success" href="/product/{{$product->id}}">view</a>
								</li>
							</ul>
						</div>
						<div>
							<small> {{$product->describtion}} </small>
							<br>	
							<small style="float: right;" >owner</small>
					    </div>
					</div>
				</div>
				@endforeach
				@endif
			</div>
		</div>
		<div class="col-md-4 col-12 sold-products" id="sold-products">
			<div class="row">
				<div class="col-12">
				<h3>Sold product</h3>
				</div>
				@if($sold->isEmpty())
				<div class="col-12" style="padding: 12px;overflow: hidden;">
					<div class="alert alert-success" role="alert">
                         No sold products
                     </div>
				</div>
				@else
				@foreach($sold as $product )
				<div class="col-12 small-product-col">
					<div  class="small-product-div">
						<img src="{{asset('/images/products/'.$product->category.'/'.$product->brand.'/'.$product->id.'/'.$product->image()->first()->name)}}">
						<strong>{{$product->name}}</strong>
						 
						<small  >price</small>
						<small >{{$product->location}}</small>
						<div class="text-center">
							<ul class="text-center">
								<li>
									<a class="btn btn-outline-success" href="/admin/forget/{{$product->id}}">forget</a>
								</li>
								
								<li>
									<a class="btn btn-outline-success" href="/product/{{$product->id}}">view</a>
								</li>
							</ul>
						</div>
						<div>
							<small> {{$product->descrbtion}} </small>
					    </div>
					</div>
				</div>
				@endforeach
				@endif
					
				</div>
		
			</div>
			<div class="col-md-4 col-12 reported-products" id="bloced-users">
				<div class="row">
					<div class="col-12">
					<h3>Blocked users</h3>
					</div>
					@if($pended->isEmpty())
					<div class="col-12" style="padding: 12px;overflow: hidden;">
						<div class="alert alert-success" role="alert">
	                         No pendedd products
	                     </div>
					</div>
					@else
					@foreach($blockedUsers as $product )
					<div class="col-12 small-product-col">
					<div  class="small-product-div">
						<img src="{{asset('/images/products/'.$product->category.'/'.$product->brand.'/'.$product->id.'/'.$product->image()->first()->name)}}">
						<strong>{{$product->name}}</strong>
						 
						<small  >price</small>
						<small >{{$product->location}}</small>
						<div class="text-center">
							<ul class="text-center">
								<li>
									<a class="btn btn-outline-success" href="/admin/unpinUser/{{$product->id}}">unpinUser</a>
								</li>
								
								<li>
									<a class="btn btn-outline-success" href="/profile/{{$product->id}}">view</a>
								</li>
							</ul>
						</div>
						<div>
							<small> descrbtion </small>
							<br>	
							<small style="float: right;" >owner</small>
					    </div>
					</div>
				</div>
					@endforeach
					@endif
				</div>
		    </div>
		    <div class="col-md-4 col-12 reported-products" id="bloced-users">
				<div class="row">
					<div class="col-12">
					<h3>Active users</h3>
					</div>
					@if($users->isEmpty())
					<div class="col-12" style="padding: 12px;overflow: hidden;">
						<div class="alert alert-success" role="alert">
	                         No active users
	                     </div>
					</div>
					@else
					@foreach($users as $user )
					<div class="col-12 small-product-col">
					<div  class="small-product-div">
						<img src="{{$user->profile_picture}}">
						<strong>{{$user->name}}</strong>
						<small></small>
						<small>{{$user->email}}</small>
						<small>{{$user->product()->count()}} active products</small>
						<div class="text-center">
							<ul class="text-center">
								<li>
									<a class="btn btn-outline-danger" href="/admin/pinUser/{{$user->id}}">Block user</a>
								</li>
								<li>
									<a class="btn btn-outline-success" href="/admin/makeAdmin/{{$user->id}}">Make admin</a>
								</li>
								<li>
									<a class="btn btn-outline-success" href="/profile/{{$user->id}}">view user</a>
								</li>
							</ul>
							<br>
					    </div>
					</div>
				</div>
					@endforeach
					@endif
				</div>
		    </div>
		</div>
		
		
	</div>


</div>
@endsection