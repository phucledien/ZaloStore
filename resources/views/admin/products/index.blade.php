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

  <div class="card mb-3 ml-3 mr-3">
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
                    <th>Name</th>
                    <th>Price</th>
                    <th>Categories</th>
                    <th>Date</th>
                    
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Categories</th>
                    <th>Date</th>
                    
                  </tr>
                </tfoot>
                <tbody>
                  @if (count($products) > 0)
                    @foreach ($products as $product)
                      <tr>
                        <td>{{$product['id']}}</td>
                        <td>
                          <div>{{$product['name']}}</div>
                          <a href="{{route('products.edit', ['id'=> $product['id']] )}}">Edit</a>  |
                          <a href="">Delete</a>
                        </td>

                        <td>{{$product['price']}}</td>
                        <td>
                          @foreach($product['cateIds'] as $category)
                            {{$category}},
                          @endforeach
                        </td>
                        <td>{{$product['updateTime']}}</td>
                        
                      </tr>
                    @endforeach
                  @else
                    <tr>
                      <th>There is no category</th>
                    </tr>
                  @endif
                </tbody>
              </table>
            </div>
          </div>
          <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
        </div>
        </div>
@endsection