@include('website.layout.css')
@include('website.layout.nav')

{{-- @section('content') --}}
<br>
<div class="container">
   @if ($errors->any())
   <div class="alert alert-danger">
      <ul>
         @foreach ($errors->all() as $error )
         <li>
            {{$error}}
         </li>
            
         @endforeach
      </ul>
   </div>
       
   @endif
   
   @if (session()->get('message'))
   <div class="alert alert-success" role="alert">
      <strong>Success:</strong>{{session()->get('message')}}
   </div>
       
   @endif
   <div class="row justify-content-center">
      <div class="col-md-8">
         <div class="card">
            <div class="card-header">{{Auth::user()->name}} Edit Profile</div>

            <div class="card-body">
               @if(session('status'))
               <div class="alert alert-success" role="alert">
                  {{session('status')}}
               </div>
               @endif
               @if ($massage = Session::get('success'))
                  <div class="alert alert-success">
                     <p>{{$message}}</p>
                  </div>
               @endif
               <form action="{{route('website.profileupdate')}}" method="POST" enctype="multipart/form-data">
               @csrf
               <div class="form-group">
                  <label for="name"><strong>Name:</strong></label>
                  <input type="text" class="form-control" id="name" name="name" value="{{Auth::user()->name}}">
               </div>
               <div class="form-group">
                <label for="age"><strong>Age:</strong></label>
                <input type="text" class="form-control" id="age" name="age" value="{{Auth::user()->age}}">
             </div>
               <div class="form-group">
                  <label for="email"><strong>Email:</strong></label>
                  <input type="text" class="form-control" id="email" name="email" value="{{Auth::user()->email}}">
               </div>
               <div class="form-group">
                  <label for="phoneno"><strong>Phone no. :</strong></label>
                  <input type="text" class="form-control" id="phoneno" name="phoneno" value="{{Auth::user()->phoneno}}">
               </div>
               <div class="form-group">
                  <label for="address"><strong>Address :</strong></label>
                  <input type="text" class="form-control" id="address" name="address" value="{{Auth::user()->address}}">
               </div>
            <br>
               <div class="form-group">
                  <label for="image">Image :</label>
                  <input type="file"  name="image" value="{{(Auth::user()->image)}}">
              </div><br>
              <div>
               <img src="{{(Auth::user()->image)}}" name="image" alt=""
               height="140" width = "140px" shape="circle"></div>
               <br>
                 <button class="btn btn-primary" type="submit">Update Profile</button>
            
            </form>
            </div>
         </div>
      </div>
   </div>
</div>
  <br><br>
@include('website.layout.footer')
@include('website.layout.js')