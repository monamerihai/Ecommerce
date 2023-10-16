@include('website.layout.css')
@include('website.layout.nav')
<!-- Start Hero Section -->
<div class="hero">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-lg-5">
                <div class="intro-excerpt">
                    <h1>Shop</h1>
                </div>
            </div>
            <div class="col-lg-7">
                
            </div>
        </div>
    </div>
</div>
<!-- End Hero Section -->



<div class="untree_co-section product-section before-footer-section">
<div class="container">
      <div class="row">

          <!-- Start Column 1 -->
        @php $count = 0 @endphp
          @foreach ($products as $row)
          @if ($count >= 3)
          @break
      @endif

        <div class="col-12 col-md-4 col-lg-3 mb-5">
            <a class="product-item" href="{{route('website.cart')}}">

                <img src="{{ asset('image/' . explode(',', $row->img)[0]) }}" class="card-img-top" alt="Card Image" style="height: 170; width:150">
                <h5 class="card-title">{{ $row->productname }}</h5>
                <p class="card-text">Price: ₹{{ $row->price }}/-</p>
                {{-- <p class="card-title">{{ $row->description }}</p> --}}

                <span class="icon-cross">

                    <img src="{{url('website/asset/dist/images/cross.svg')}}" class="img-fluid">

                </span>

            </a>

        </div> 
        {{-- @php $count++ @endphp --}}

        @endforeach

        

@include('website.layout.footer')
@include('website.layout.js')