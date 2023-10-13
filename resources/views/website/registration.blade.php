
@include('website.layout.css')

{{-- @section('content') --}}
<div class="untree_co-section product-section before-footer-section">

    <div class="col-md-6" style="align-self: center; margin:auto">
        <div class="col md-3" style="text-align:left">
           <div class="header" style="align-content: center; text-align:center; font-family:Gill Sans, Gill Sans MT, Calibri, Trebuchet MS " 
           ><h1>
              Registration</h1></div>
<br>
 

            @if($errors->any())
                @foreach($errors->all() as $error)
                <p style="color:red;">{{ $error }}</p>
                @endforeach
            @endif
        
            <form action="{{ route('website.registration.post') }}" method="POST"  class="ms-auto me-auto mt-auto" style="width:500px">
                @csrf
                <label style="text-align: left" for="name">Name :</label>
                <input type="text" class="form-control" style="justify-content:last baseline" name="name" placeholder="Enter Name">
                Email :
                <input type="email" class="form-control" name="email" placeholder="Enter Email">
                Password :
                <input type="password" class="form-control" name="password" placeholder="Enter Password">
                Confirm Password :
                <input type="password"class="form-control"  name="password_confirmation" placeholder="Enter Confirm Password">
                <br>
                <input type="submit" class="btn btn-secondary me-2 value="Register">
                <br>
                <input type="hidden" name="user_status" value="1">
        
            </form>
        
            @if(Session::has('success'))
                <p style="color:green;">{{ Session::get('success') }}</p>
            @endif
        </div>

    </div>
</div>
</div>
      
   {{-- @endsection --}}