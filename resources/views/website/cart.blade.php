@include('website.layout.css')
@include('website.layout.nav')

<!-- Start Hero Section -->
<div class="hero">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-lg-5">
                <div class="intro-excerpt">
                    <h1>Cart</h1>
                </div>
            </div>
            <div class="col-lg-7">
                
            </div>
        </div>
    </div>
</div><div class="container">
  <h1>Shopping Cart</h1>
  {{-- @if (count($prducts) > 0) --}}
      <table class="table">
          <thead>
              <tr>
                  <th>Product</th>
                  <th>Price</th>
                  <th>Quantity</th>
                  <th>Total</th>
                  <th>Action</th>
              </tr>
          </thead>
          <tbody>
              @foreach ($product as $item)
                  <tr>
                      <td>{{ $item->productname }}</td>
                      <td>₹{{ $item->price }}/-</td>
                      <td>{{ $item->qty }}</td>
                      <td>₹{{ $item->price }}/-</td>
                      <td>
                          <a href="{{ route('remove-from-cart', ['id' => $item->id]) }}" class="btn btn-danger">Remove</a>
                      </td>
                  </tr>
              @endforeach
          </tbody>
      </table>
      <div class="text-right">
          {{-- <strong>Total: ₹{{ $total }}/-</strong> --}}
      </div>
      <div class="text-center">
          <a href="{{ route('website.checkout') }}" class="btn btn-primary">Checkout</a>
      </div>
  {{-- @else --}}
      <p>Your shopping cart is empty.</p>
  {{-- @endif --}}
</div>
@include('website.layout.footer')
@include('website.layout.js')