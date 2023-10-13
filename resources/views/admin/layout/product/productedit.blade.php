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
        <form id="editForm" action="{{url('productupdate')}}" method="POST" enctype="multipart/form-data">
            @csrf
           
                <div class="card-body">
                <div class="form-group">
                    <label for="lang">Select category</label>
               <select name="categoryid" id="category" class="form-control">
               <option value="select">category </option>
               @foreach($categorys as $row )
             <option value="{{$row->id}}">{{$row->categoryname}}</option>
             @endforeach 
    </select>
</div>
<div class="form-group">
                  <label for="lang">Select  Subcat Name  </label>
             <select name="subcategoryid" id="subcategory" class="form-control">
             
             <option value="select">Subcategory </option>
             @foreach($categorys as $row )
             <option value="{{$row->id}}">{{$row->categoryname}}</option>
             @endforeach  
                                      
                                        </option>
            
           
        
</select>
</div>

                  
                 <div class="form-group">
                    <label for="">Tittle</label>
                    <input type="text" class="form-control" id="" placeholder="Tittle" name="tittle" value="{{$product->tittle}}">
                    <input type="text" id="id" name="id" value="{{$product->id}}">
                  </div>
                  <div class="form-group">
                    <label for="">Price</label>
                    <input type="text" class="form-control" id="" placeholder="Price" name="price"value="{{$product->price}}">
                  </div>
                  <div class="form-group">
                    <label for="">Product name</label>
                    <input type="text" class="form-control" id="" placeholder="productname" name="productname"value="{{$product->productname}}">
                  </div>
                  <div class="form-group">
                    <label for="">Qty</label>
                    <input type="text" class="form-control" id="" placeholder="qty" name="qty"value="{{$product->qty}}">
                  </div>
                  <div class="form-group">
    <label for="description">Description:</label>
    <textarea id="description" name="description" class="form-control">{{ $product->description }}</textarea>
</div>

              
         
                  <div class="form-group">
                    <label for="exampleInputFile">File input</label>
                  
                    <div class="input-group">
                    <div class="field_wrapper">
    <div>
     <input type="hidden" name="oldimg" value="{{ $product->img }}">
                     <img src="{{ url('image/' . $product->img) }}" class="css-class" alt="alt text"  width="100px">

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



            