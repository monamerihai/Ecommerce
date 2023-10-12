
@include('admin/layout/header');
<section class="content-wrapper">
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
              <td id="table-form">
        <form id="editForm" action="{{route('update')}}" method="POST" enctype="multipart/form-data">
            @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="Name">Name</label>
                    <input type="text" class="form-control" id="name" placeholder="Name"name="categoryname"value="{{$category1->categoryname}}">
                    <input type="hidden" id="id" name="id" value="{{$category1->id}}">
                    
                  </div>
                 
         
                  <div class="form-group">
                    <label for="exampleInputFile">File input</label>
                    
                    <input type="hidden" name="oldimg" value="{{$category1->img}}">
                     <img src="{{url('image/' . $category1->img) }}" class="css-class" alt="alt text"  width="100px"> 
                    
                    <div class="input-group">
                      <div class="custom-file">
                      
                        <input type="file" class="custom-file-input" id="img"name="img">
                        <input type="text" name="oldimg" value="{{$category1->img}}">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                     
                    </div>
                  </div>
                 
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                <input type="submit" id="edit-submit"class="btn btn-info" value="Update">
                </div>
              </form>
            </div>
            <!-- /.card -->

            <!-- Form Element sizes -->
            
            <!-- /.card -->

          
            <!-- /.card -->

            <!-- Input addon -->
            

          </div>
          <!--/.col (left) -->
          <!-- right column -->
          <div class="col-md-6">
            <!-- general form elements disabled -->
          
            <!-- /.card -->
          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>

              @include('admin/layout/fotter');
