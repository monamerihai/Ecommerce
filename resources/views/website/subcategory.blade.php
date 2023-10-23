@include('website.layout.css')
@include('website.layout.nav')
<h2>Subcategories list</h2>
<table id="example2" class="table table-bordered table-hover">
    <thead>
  <tr>
    <th>cat name</th>
    <th>SubCat Name</th>
    <th>Img</th>
  </tr>
  </thead>

  <tbody>
  @foreach ($subcategory as $row)
  <tr>
    <td>{{$row->categoryname}}</td> 
    <td>{{$row->subcatname}}</td>
    <td> <img src="{{('image/' . $row->img) }}"class="css-class" alt="alt text"  width="100px"> </td>
  </tr>
  @endforeach
  </tbody>
  <tfoot>
  </tfoot>
</table>
  @include('website.layout.footer')
  @include('website.layout.js')