@include('website.layout.css')
@include('website.layout.nav')
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
       <strong></strong>{{session()->get('message')}}
    </div>
        
    @endif
    <div class="row justify-content-center">
       <div class="col-md-6">
        <br><br>
          <div class="card" style="align-content: center">
             <div class="card-header">
            <h3>{{Auth::user()->name}} Change Password  </h3>    
                
            
            </div>
 
             <div class="card-body">
                
                @if(count($errors))
                @foreach ($errors->all() as $error )
                <p class="alert alert-danger alert-dismissible fade show">
                   {{
                      $error
                   }}
                </p>
                   
                @endforeach
                @endif
                <form action="{{route('update.password')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                   <label for="example-text-input"><strong>Old password :</strong></label>
                   <input type="text" class="form-control" id="oldpassword" name="oldpassword" >
                </div>
                <div class="form-group">
                 <label for="example-text-input"><strong>New password :</strong></label>
                 <input type="text" class="form-control" id="newpassword" name="newpassword" >
              </div>
              <div class="form-group">
                 <label for="example-text-input"><strong>Confirm password :</strong></label>
                 <input type="text" class="form-control" id="confirmpassword" name="confirmpassword" >
              </div>
                
                <br>
                  <button class="btn btn-primary" type="submit">Change Password</button>
             
             </form>
             </div>
          </div>
       </div>
    </div>
 </div><br><br>
 @include('website.layout.footer')
@include('website.layout.js')