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
                    <th>ID</th>
                    <th>Name
                    </th>
                    <th>OA_ID</th>
                    <th>OA_SECRET</th>
                    <th>Date</th>
                    <th>Select</th>
                    <th>Edit</th>
                    <th>Delete</th>
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
                      <td>
                        <button type="button" class="btn btn-info">Select</button>
                      </td>
                      <td>
                        <button type="button" class="btn btn-success">Edit</button>
                      </td>
                      <td>
                        <button type="button" class="btn btn-danger">Delete</button>
                      </td>
                      
                    </tr>
                  
                </tbody>
              </table>
            </div>

            <button type="button" class="btn btn-success mt-2"><a href='{{route('stores.create')}}'>Create</button>
          </div>
          
          <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
        </div>
        </div>
@endsection