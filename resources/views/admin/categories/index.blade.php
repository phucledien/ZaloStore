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
        <li class="breadcrumb-item active">Categories</li>
    </ol>

    <div class="row">
        <div class="col-md-3">
        
            <div class="card mb-3 ml-3 mr-3">
                <div class="card-header">
                    Create Category
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

                        <button type="button" class="btn btn-success mt-2">Create</button>
                    </form>
                </div>
            </div>
        
        </div>
        <div class="col-md-9">
            <div class="card mb-3 ml-3 mr-3">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-2">Products</div>
                        <div class="col-md-10">
                            <form class="form-inline offset-md-7" action="">
        
                                <div class="form-group ">
                                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="Search" placeholder="Search">
                                <button class="btn btn-outline-secondary" type="button">Button</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Description</th>
                                 
                                <th>Edit</th> 
                                <th>Delete</th> 
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>Name</th>
                                <th>Description</th>
                                  
                                <th>Edit</th> 
                                <th>Delete</th> 
                            </tr>
                            </tfoot>
                            <tbody>
                                @foreach( $categories as $category)
                                    <tr>
                                        <td>{{$category['name']}}</td>
                                        <td>{{$category['description']}}</td>
                                        <td>
                                            <button type="button" class="btn btn-success">
                                            <a href="{{ route('categories.edit', ['id'=> $category['id']]) }}">Edit</a></button>
                                        </td>
                                        <td>
                                        <form action="{{ route('categories.destroy', ['id'=> $category['id']]) }}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="btn btn-danger" >Delete</button>
                                        </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer small text-muted">
                    Updated yesterday at 11:59 PM
                </div>
                
            </div>
        
    </div>      
@endsection