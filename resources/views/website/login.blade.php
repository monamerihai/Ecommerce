
@include('website.layout.css')
{{-- @section('content') --}}

<div class="untree_co-section product-section before-footer-section">

    <div class="container">
      <div class="mt-5">
        @if($errors->any())
         
        <div class="col-12">
            @foreach ($errors->all() as $error )
            <div class="alert alert-danger">{{$error}}</div>
              
            @endforeach

        </div>

        @endif

        @if (session()->has('error'))
        <div class="alert alert-danger">{{session('error')}}</div>

          
        @endif
        @if (session()->has('success'))
        <div class="alert alert-success">{{session('success')}}</div>

          
        @endif
      </div>
      
      <div class="header" style="align-content: center; text-align:center; font-family:Gill Sans, Gill Sans MT, Calibri, Trebuchet MS " 
      ><h1>
         Login </h1></div>

        <form  action="{{route('website.login')}}" method="POST" style="width:500px"onsubmit="return validate();">

          @csrf
            <div class="mb-3">
                <label class="form-label">Email address :</label>
                <input type="email" class="form-control" name ="email" >
                 <span id="emailError" class="text-danger"></span>
             
              </div>
            <div class="mb-3">
              <label class="form-label">Password :</label>
              <input type="password" class="form-control" name = "password">
              <span id="passwordError" class="text-danger"></span>
            
            </div>
         
            <button type="submit"  class="btn btn-secondary me-2">Login </button>
            <a class="btn btn-secondary" href="{{route('website.registration')}}"> New user</a>
            
          </form>
           <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
  function validate(){
   
    var email = $('#email').val();
    var password = $('#password').val();
    var error= '0';
   
//alert(email)



//alert(error)
if (!/^[a-zA-Z]+$/.test(email)) {
    $('#emailError').text('email  must contain only letters (characters).');
    var error = 1;
}
if (!/^[a-zA-Z]+$/.test(password)) {
    $('#passwordError').text('password  must contain only letters (characters).');
    var error = 1;
}



if(error === '0'){
//alert('a')
return true;

}else{
 // alert('aa')
return false;
}

  }
</script>
    </div>

</div>
   {{-- @endsection --}}
   