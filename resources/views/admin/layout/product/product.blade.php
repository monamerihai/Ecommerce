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
    <form action="{{route('productstore')}}" method="post" enctype="multipart/form-data" onsubmit="return validate();">
            @csrf
            <div class="card-body">
                  <div class="form-group">
                  <label for="lang">Selecct Category  </label>
             <select name="categoryid" id="category" class="form-control">
             <option value="select">Select Category </option>
             @foreach($categories as $row )
             <option value="{{$row->id}}">{{$row->categoryname}}</option>
             @endforeach  
</select>
                  
</div>
<div class="form-group">
                  <label for="lang">Select Subcategory Id</label>
             <select name="subcategoryid" id="subcategory" class="form-control">
             <option value="select">Select Sub Category </option>
            
            
             </select>
                  
                  </div>
                  <div class="form-group">
                    <label for="Product Name">Product Name</label>
                    <input type="text" class="form-control" id="productname" placeholder="Product Name" name="productname"requred>
                    <span id="productnameError" class="text-danger"></span>
</div>
                 <div class="form-group">
                    <label for="Tittle">Tittle</label>
                    <input type="text" class="form-control" id="tittle" placeholder="Tittle" name="tittle">
                    <span id="tittleError" class="text-danger"></span>
                  </div>
                  <div class="form-group">
                    <label for="Price">Price</label>
                    <input type="number" class="form-control" id="Price" placeholder="Price" name="price">
                    <span id="priceError" class="text-danger"></span>
                  </div>
                  <div class="form-group">
                    <label for="Price1">Qty</label>
                    <input type="number" class="form-control" id="qty" placeholder="Qty" name="qty">
                    <span id="qtyError" class="text-danger"></span>
                  </div>
                  Description -:
                  <textarea type="text" id="description" name="description"class="form-control"></textarea>
                  <span id="descriptionError" class="text-danger"></span>
                     <div class="field_wrapper">
    <div>
    <input type="file"  id=""name="img[]">
         <a href="javascript:void(0);" class="add_button btn btn-primary" title="Add field">Add More</a>
    </div>
</div>
                    </div>
                  </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" id="submitBtn" class="btn btn-primary">Submit</button>
                </div>
              </form>
              <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
  function validate(){
    $('#priceError').val('');
    var price = $('#Price').val();
    var qty = $('#qty').val();
   
    var error= '0';
   
//alert(price)
//alert(price)
// Client-side validation
if ( price <= 0) {
  //alert('hu');
    $('#priceError').text('Price must be a positive number.');
   var  error=1;
    
}  
if ( qty <= 0) {
  //alert('hu');
    $('#qtyError').text('qty must be a positive number.');
   var  error=1;
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
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                <th>SNo.</th>
                  <th>cat name</th>
                  <th>SubCat Name</th>
                  
                  <th>Img</th>
                  <th>Tittle</th>
                  <th>Price</th>
                  <th>Desc</th>
                  <th>Qty</th>
                 
                  <th>action</th>
                </tr>
                </thead>
               
                <tbody>
                @foreach ($products as $row)
                <td>{{$row->id}}</td>
                <td> {{$row->category1->categoryname}}</td>
               
               
                <td>{{$row->subcategory->subcatname}}</td>
                <td> 
                <?php 
$res = explode(',',$row->img);

?>
@foreach($res as $value)
  <img src="{{asset('image/' . $value) }}" class="css-class" alt="multiple image"  style="width:100px; height:100px; object-fit:cover;"> 
@endforeach
</td>
                  <td>{{$row->tittle}}</td>                 
                  <td>{{$row->price}}</td>
                  <td>{{$row->description}}</td>
                  <td>{{$row->qty}}</td>
             
                  <td>
                  <a href="{{route('productedit',$row->id)}} " id="createNewPost"class="btn btn-info" >Edit</a>
                  <a href="{{ route('productdelete', $row->id) }}" class="btn btn-xs btn-danger" onclick="return confirm('Are you sure?')">Delete</a>
                  
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


@include('admin/layout/fotter');