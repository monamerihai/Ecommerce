@include('website.layout.css')
@include('website.layout.nav')
   
    <div class="container">
		<br>
		<div class="card">
			<div class="container-fliud">
				<div class="wrapper row">
					<div class="preview col-md-6">
						
						<div class="preview-pic tab-content">
						  <div style="margin:2cm "><img style="max-width: 120%;" src="{{ asset('image/' . explode(',', $product->img)[0]) }}" /></div>
						</div>
						
						
					</div>
					<div class="details col-md-6">
						<br>
						<h3 class="product-title">{{ $product->productname }}</h3>
						<p> {{$product->category1->categoryname}} {{$product->subcategory->subcatname}}</p>
						
						<p class="vote"><strong>91%</strong> of buyers enjoyed this product! <strong>(87 votes)</strong></p>
						<div class="rating">
							<div class="stars">
								<span class="fa fa-star checked" style="color:rgb(247, 210, 45) "></span>
								<span class="fa fa-star checked" style="color:rgb(247, 210, 45) " ></span>
								<span class="fa fa-star checked" style="color:rgb(247, 210, 45)  " ></span>
								<span class="fa fa-star"></span>
								<span class="fa fa-star"></span>
							</div>
							<span class="review-no">41 reviews</span>
						</div>
						<p class="product-description">{{ $product->description }}</p>
						<h5 class="price">Price: <del style="color: red">₹{{ $product->price }} </del></h4>
							<h4 class="price">Offer Price: <span>₹{{ $product->price*0.8 }}</span></h4>
						
							<div class="action">
							<p>
								
								@auth
								<a href="{{ route('website.checkout',['id' => $product->id]) }}"  class="btn btn-secondary me-2" role="button">Buy Now</a> 
								@endauth
								
								@guest
								<a href="{{ route('website.login',['id' => $product->id]) }}) }}"  class="btn btn-secondary me-2" role="button">Buy Now</a>
								@endguest
								<a href="#" style="
								background: #3b5d50 !important;" class="btn btn-warning btn-block text-center" role="button">Add to cart</a> </p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div><br>
    @include('website.layout.footer')
    @include('website.layout.js')
      {{-- @php $count++ @endphp --}}

