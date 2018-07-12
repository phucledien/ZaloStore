@extends ('admin.layouts.master')

@section('content')
<div class="container-fluid">

  <!-- Breadcrumbs-->
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="{{ route('dashboard') }}">Dashboard</a>
    </li>
    <li class="breadcrumb-item active">Products</li>
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
            <div class="row">
              <span>Products</span>
              <form class="form-inline offset-md-8" action="">
                <div class="form-group ">
                  <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="Search" placeholder="Search">
                  <button class="btn btn-outline-secondary" type="button">Button</button>
                </div>
              </form>
              
            </div>
          </div>
          
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Image</th>  
                    <th>Name</th>
                    <th>Price</th>
                    <th>Categories</th>
                    <th>Updated Date</th>
                    <th>Edit</th>
                    <th>Delete</th>
                    
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>ID</th>
                    <th>Image</th> 
                    <th>Name</th>
                    <th>Price</th>
                    <th>Categories</th>
                    <th>Updated Date</th>
                    <th>Edit</th>
                    <th>Delete</th>
                    
                  </tr>
                </tfoot>
                <tbody>
                  @if (count($products) > 0)
                    @foreach ($products as $product)
                      <tr>
                        <td>{{$product['id']}}</td>
                        <td> <img width="50" height="50" src="{{$product['photoLinks'][0]}}" ></td>
                        <td>
                          <div>{{$product['name']}}</div>
                        </td>

                        <td>{{$product['price']}}</td>
                        <td>
                          @foreach($product['cateIds'] as $category)
                            {{$category}},
                          @endforeach
                        </td>
                        <td>{{ \Carbon\Carbon::createFromTimestampMS($product['updateTime'])->format('d-m-Y') }}</td>
                        <td>
                          <a href="{{route('products.edit', ['id'=> $product['id']] )}}" class="btn btn-success">Edit</a>
                        </td>
                        <td>
                          <form action="{{ route('products.destroy', ['id'=> $product['id']]) }}" method="POST">
                          @method('DELETE')
                          @csrf
                          <button type="submit" class="btn btn-danger">Delete</button>
                          </form>
                        </td>
                      </tr>
                    @endforeach
                  @else
                    <tr>
                      <th>There is no products</th>
                    </tr>
                  @endif
                </tbody>
              </table>
            </div>
          </div>
    
        </div>
        </div>
@endsection