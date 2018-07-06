@extends ('admin.layouts.master')

@section('content')
<div>
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
                    <th>Name</th>
                    <th>Price</th>
                    <th>Categories</th>
                    <th>Date</th>
                    
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Categories</th>
                    <th>Date</th>
                    
                  </tr>
                </tfoot>
                <tbody>
                  @foreach ($products as $product)
                    <tr>
                      <td>
                        Tiger Nixon
                        <a href="{{route('products.edit',['id'=> $product->id])}}">Edit</a>
                        <a href="">Delete</a>
                      </td>

                      <td>$320,800</td>
                      <td>61</td>
                      <td>2011/04/25</td>
                      
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
          <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
        </div>
        </div>
@endsection