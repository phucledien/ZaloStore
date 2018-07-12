@extends ('admin.layouts.master')

@section ('content')
<div class="container-fluid">

  <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="{{ route('dashboard') }}">Dashboard</a>
        </li>
        <li class="breadcrumb-item">
          <a href="{{ route('products.index') }}">Products</a>
        </li>
        <li class="breadcrumb-item active">Create Product</li>
    </ol>
    @if (Session::has('success'))
      <div class="alert alert-success alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
          </button>
          {{ Session::get('success') }}
      </div>
    @endif
    <div class="card mb-3">
        <div class="card-header">
            Create Product
        </div>
        <div class="card-body">

            <form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>Product name</label>
                    <input type="text" class="form-control" id="name" name='name'>
                </div>

                <div class="form-group">
                    <label>Description</label>
                    <textarea class="form-control" id="description" name='description' rows="3"></textarea>
                </div>

                <div class="form-group">
                    <label>Price</label>
                    <input type="number" class="form-control" id="price" name='price'>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="cate">Categories</label>
                        <select id="cate" class="form-control" name="Categories">
                            @foreach ($categories as $category)
                                <option name="Categories[]" value="{{$category['id']}}">{{$category['name']}}</option>
                            @endforeach
                        </select>
                    </div>
                    
                </div>

                <div class="custom-file">
                    <label for="inputState">Images</label>
                    <input type="file" class="custom-file-input" id="images" name='images[]' multiple>
                    <label class="custom-file-label" for="images">Choose file...</label>
                </div>

                <button type="submit" class="btn btn-primary mt-2">Create product</button>
            </form>
        </div>
    </div>
</div>       
@endsection