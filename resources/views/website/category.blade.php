@include('website.layout.css')
@include('website.layout.nav')
<h2>Categories list</h2>
<table id="example2" class="table table-bordered table-hover">
    <thead>
    <tr>
      <th>Id</th>
      <th>Category Name</th>
      <th>Img</th>
     
    </tr>
    </thead>
    <tbody>
    @foreach ($Data as $row)

    <tr>
      <td>{{$row->id}}</td>
      <td>{{$row->categoryname}}</td>
     <td> <img src="{{('image/' . $row->img) }}" class="css-class" alt="alt text"  width="100px"> 
    
</td>
     
 
    </tr>
    @endforeach

    </tbody>
    <tfoot>
  
    </tfoot>
  </table>
  @include('website.layout.footer')
  @include('website.layout.js')