@include('admin/layout/header')

<section class="content-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Quick Example</h3>
                    </div>
                    <div class="card-body">
                    <td id="table-form">
                    <form id="editForm" action="{{route('subcatupdate')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="Catid">Select category</label>
                                @php 
                                $subcategory_data=App\Models\category1::find($subcategory->catid);
                                
                                @endphp
                                <select name="Catid" id="Catid" class="form-control">
                                <option value="select">Select category</option>
                                 
                                        <option value="{{ $subcategory->catid }}" >
                                      {{ $subcategory_data->categoryname}}  
                                        </option>
                                   
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="Name">Sub Category name</label>
                                <input type="text" class="form-control" id="name" placeholder="Sub Category Name" name="subcatname" value="{{ $subcategory->subcatname }}">
                                <input type="text" id="id" name="id" value="{{ $subcategory->id }}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">File input</label>
                                <input type="hidden" name="oldimg" value="{{ $subcategory->img }}">
                                <img src="{{ url('image/' . $subcategory->img) }}" class="css-class" alt="alt text" width="100px">
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="img" name="img">
                                        <input type="text" name="oldimg" value="{{ $subcategory->img }}">
                                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <input type="submit" id="edit-submit" class="btn btn-info" value="Update">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <!-- Add any content for the right column here -->
            </div>
        </div>
    </div>
</section>

@include('admin.layout.fotter')
