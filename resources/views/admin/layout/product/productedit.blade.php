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
        <form id="editForm" action="" method="POST" enctype="multipart/form-data">
            @csrf
           
                <div class="card-body">
                 
                  
                 <div class="form-group">
                    <label for="">Tittle</label>
                    <input type="text" class="form-control" id="" placeholder="Tittle" name="title" value="{{$product->tittle}}">
                    <input type="text" id="id" name="id" value="{{$product->id}}">
                  </div>
                  <div class="form-group">
                    <label for="">Price</label>
                    <input type="text" class="form-control" id="" placeholder="Price" name="price"value="{{$product->price}}">
                  </div>
                 
                  <div class="form-group">
                    <label for="lang">Select category</label>
               <select name="category" id="category" class="form-control">
                
              
          
    </select>
                    
    </div>

                 
                  <div class="form-group">
                  <label for="lang">Select  Subcat Name  </label>
             <select name="subcategory" id="subcategory" class="form-control">
             <option value=""> </option>
           
            
           
        
</select>
</div>
         
                  <div class="form-group">
                    <label for="exampleInputFile">File input</label>
                  
                    <div class="input-group">
                    <div class="field_wrapper">
    <div>
     <input type="hidden" name="oldimg" value="">
                     <img src="" class="css-class" alt="alt text"  width="100px">

    <input type="file"  id=""name="img[]"name="img"value="">
         <a href="javascript:void(0);" class="add_button" title="Add field">Add</a>
    </div>
</div>
                     
                    </div>
                  </div>
                 
                </div>
            

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



            