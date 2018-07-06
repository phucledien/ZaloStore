@extends ('admin.layouts.master')

@section('content')
<div>
  <div class="card mb-3 ml-3 mr-3">
          <div class="card-header">
            <div class="row">
              <span>Products</span>
              <form class="form-inline offset-md-8 offset-sm-5" action="">
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
                    <th>Date</th>
                    <th>Customer</th>
                    <th>Shipping</th>
                    <th>Payment</th>
                    <th>Total</th>
                  </tr>
                </thead>
                
                <tbody>
                  
                    <tr>
                      <td>
                        Tiger Nixon
                      </td>
                      <td>$320,800</td>
                      <td>61</td>
                      <td>2011/04/25</td>
                      <td>2011/04/25</td>
                      <td>2011/04/25</td>
                      
                    </tr>
                  
                </tbody>
              </table>
            </div>
          </div>
          <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
        </div>
        </div>
@endsection