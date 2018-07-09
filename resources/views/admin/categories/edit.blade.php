@extends ('admin.layouts.master')

@section ('content')

    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
        <a href="{{ route('dashboard') }}">Dashboard</a>
        </li>
        <li class="breadcrumb-item">
        <a href="{{ route('products.index') }}">Products</a>
        </li>
        <li class="breadcrumb-item">
        <a href="{{ route('categories.index') }}">Products</a>
        </li>
        <li class="breadcrumb-item active">Edit Category</li>
    </ol>

    <div class="card mb-3 ml-3 mr-3">
        <div class="card-header">
            Edit Categories
        </div>
        <div class="card-body">

            <form>

                <div class="form-group">
                    <label>Name</label>
                    <input type="text" class="form-control" id="productName">
                </div>

                <div class="form-group">
                    <label>Description</label>
                    <textarea class="form-control" id="productDescription" rows="3"></textarea>
                </div>

                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="validatedCustomFile" required>
                    <label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
                    <div class="invalid-feedback">Example invalid custom file feedback</div>
                </div>

                <button type="button" class="btn btn-success mt-2">Success</button>
            </form>
        </div>
    </div>
       
@endsection