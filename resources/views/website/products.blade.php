@include('website.layout.css')
@include('website.layout.nav')
<div class="card" style="width: 18rem;">
    <img src="https://dummyimage.com/180x120/dbdbdb/787878.png&text=Image+cap" class="card-img-top" alt="...">
    <div class="card-body">
        <h5 class="card-title">Card title</h5>
        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
        <a href="#" class="btn btn-primary">Go somewhere</a>
    </div>
</div>
<h2>Product list</h2>
<div class="card" style="width: 18rem;">
    @foreach ($products as $row)
    <div class="card">
        <!-- Add your card styling here as per your design requirements -->
        <img src="{{ asset('image/' . explode(',', $row->img)[0]) }}" class="card-img-top" alt="Card Image">
        <div class="card-body">
            <h5 class="card-title">{{ $row->productname }}</h5>
            <p class="card-text">Category: {{ $row->categoryname }}</p>
            <p class="card-text">Subcategory: {{ $row->subcatname }}</p>
            <p class="card-text">Price: ${{ $row->price }}</p>
            <p class="card-text">{{ $row->description }}</p>
            <p class="card-text">Qty: {{ $row->qty }}</p>
            <a href="#" class="btn btn-primary">Go somewhere</a>
            
        </div>
    </div>
    @endforeach
</div>

  @include('website.layout.footer')
  @include('website.layout.js')