    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>{{ $product->productname }}</h1>
                <p>Category: {{ $product->categoryname }}</p>
                <p>Subcategory: {{ $product->subcatname }}</p>
                <p>Price: ${{ $product->price }}</p>
                <p>Description: {{ $product->description }}</p>
                <p>Image:{{$product->img}}</p>
  
                
                <!-- Add more product details as needed -->
            </div>
        </div>
    </div>
