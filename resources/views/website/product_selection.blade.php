
<div class="container">
    <form method="POST" action="{{ route('products.index') }}">
        @csrf

        <div class="form-group">
            <label for="category">Category:</label>
            <select class="form-control" id="category" name="category">
                @foreach ($categorys as $category)
                <option value="{{ $category->id }}">{{ $category->categoryname }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="subcategory">Subcategory:</label>
            <select class="form-control" id="subcategory" name="subcategory">
                <option value="" selected disabled>Select Subcategory</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Show Products</button>
    </form>
</div>

<script>
    $(document).ready(function () {
        $('#category').on('change', function () {
            var categoryId = $(this).val();
            if (categoryId) {
                $.ajax({
                    url: '/getSubcategories/' + categoryId,
                    type: 'GET',
                    dataType: 'json',
                    success: function (data) {
                        $('#subcategory').empty();
                        $.each(data, function (key, value) {
                            $('#subcategory').append('<option value="' + key + '">' + value + '</option>');
                        });
                    }
                });
            } else {
                $('#subcategory').empty();
            }
        });
    });
</script>
