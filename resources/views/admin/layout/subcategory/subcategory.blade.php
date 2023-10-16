@include('admin/layout/header');
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>General Form</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">General Form</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Quick Example</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    
              <form action="{{route('subcatstore')}}" method="post" enctype="multipart/form-data"onsubmit="return validate();">
            @csrf
                <div class="card-body">
                  <div class="form-group">
                  <label for="lang">Select category</label>
             <select name="Catid" id="lang" class="form-control">
             <option value="select">Select category</option>
             @foreach($categorys as $row )
             <option value="{{$row->id}}">{{$row->categoryname}}</option>
             @endforeach
             
</select>
                  
</div>
                  <div class="form-group">
                    <label for="">Sub category name</label>
                    <input type="text" class="form-control" id="subcatname" placeholder="Sub category" name="subcatname"required>
                    <span id="subcatnameError" class="text-danger"></span>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputFile">Img</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id=""name="img">
                        <label class="custom-file-label" for="">Choose file</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text" id="">Upload</span>
                      </div>
                    </div>
                  </div>
                 
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary" id="submitBtn">Submit</button>
                </div>
              </form>
              <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
  function validate(){
   
    var subcatname = $('#subcatname').val();
    var error= '0';
   
//alert(subcatname)



//alert(error)
if (!/^[a-zA-Z]+$/.test(subcatname)) {
    $('#subcatnameError').text('subcatname  must contain only letters (characters).');
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
            <!-- /.card -->

         
            </div>
           

          </div>
         
          <div class="col-md-6">
            <!-- general form elements disabled -->
            
            <!-- /.card -->
          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  
  <!-- /.content-wrapper -->
  <!DOCTYPE html>
<html>

<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
 

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>DataTables</h1>
          

          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">DataTables</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">DataTable with minimal features & hover style</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
           
            @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
        @endif
    
          
   
     
              <table id="example2" class="table table-bordered table-hover">
                  <thead>
                <tr>
                  <th>SNo.</th>
                  <th>cat name</th>
                  <th>SubCat Name</th>
                  <th>Img</th>
                  <th>action</th>
                 
                </tr>
                </thead>
            
                <tbody>
                @foreach ($subcategory as $row)
            
           
                <tr>
                  <td>{{$row->id}}</td>
                  <td>{{$row->categoryname}}</td> 
                  <td>{{$row->subcatname}}</td>
                  <td> <img src="{{('image/' . $row->img) }}"class="css-class" alt="alt text"  width="100px"> </td>
                 
                

                  <td>
                  <a href="{{route('subcatedit',$row->id)}}" id="createNewPost"class="btn btn-info" >Edit</a>
                  <a href="{{ route('subdelete', $row->id) }}" class="btn btn-xs btn-danger" onclick="return confirm('Are you sure?')">Delete</a>
                  
                </td>
             
                </tr>
                @endforeach
                </tbody>
                <tfoot>
              
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->

          
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->

<!-- page script -->

</body>
</html>
 @include('admin/layout/fotter');