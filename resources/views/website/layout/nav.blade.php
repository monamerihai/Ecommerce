
<!-- Start Header/Navigation -->
<nav class="custom-navbar navbar navbar navbar-expand-md navbar-dark bg-dark" arial-label="Furni navigation bar">

	<div class="container">
		<a class="navbar-brand" href="{{route('website.index')}}">Shop<span>Zee.</span></a>

		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsFurni" aria-controls="navbarsFurni" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarsFurni">
			<ul class="custom-navbar-nav navbar-nav ms-auto mb-2 mb-md-0">
				<li>
					<a class="nav-link" href="{{route('website.index')}}">Home</a>
				</li>
				<li><a class="nav-link" href="{{route('website.shop')}}">Shop</a></li>
				<li><a class="nav-link" href="{{route('website.about')}}">About us</a></li>

				@auth
				<li><a class="nav-link" href="{{route('website.services')}}">Services</a></li>
				@endauth
				<li><a class="nav-link" href="{{route('website.blog')}}">Blog</a></li>
			    @auth
				<li>
					
					<a class="nav-link" href="{{route('website.contact')}}">Contact us</a></li>
			</ul>
			@endauth
			
					@auth
					<ul class="custom-navbar-cta navbar-nav mb-2 mb-md-0 ms-5">
						<li>
					<div class="dropdown " style="margin: inherit;" >
						<a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
							<img src="{{url('website/asset/dist/images/user.svg')}}">
						</a>
						<ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser1">
						  <li><a style="color:black"class="dropdown-item" href="{{route('website.password')}}">change Password</a></li>
						  <li><a style="color:black"class="dropdown-item" href="{{route('website.edit')}}">Edit Profile</a></li>
						  <li><hr class="dropdown-divider"></li>
						  <li><a style="color:black"class="dropdown-item" href="{{route('website.logout')}}">Log out</a></li>
						</ul>
					  </div>
				</li>
				    <li><a class="nav-link" href="{{route('website.cart')}}">
					<img src="{{url('website/asset/dist/images/cart.svg')}}"></a></li>
					<li><a class="nav-link" href="{{route('website.logout')}}">Log out</a></li>
                      @endauth

                    @guest
                     <li><a class="nav-link" href="{{route('website.login')}}"> Login</a>
					</li>@endguest
					
			</ul>
		</div>
	</div>
		
</nav>
<!-- End Header/Navigation -->
