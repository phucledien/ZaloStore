@extends ('admin.layouts.master')

@section('content')
<div class="container-fluid">


    
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="{{ route('dashboard') }}">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Stores</li>
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
                    @foreach ($stores as $store)
                    <tr>
                      <td>{{ $store->id }}</td>

                      <td>{{ $store->name }}</td>
                      <td>{{ $store->oa_id }}</td>
                      <td>{{ $store->oa_secret }}</td>
                      <td>{{ $store->created_at }}</td>
                      @if (Auth::user()->store_id != $store->id)
                      <td>
                        <button type="button" class="btn btn-info">Select</button>
                      </td>
                      @else
                      <td>
                        <button type="button" class="btn btn-info" disabled>Select</button>
                      </td>
                      @endif
                      <td>
                        <button type="button" class="btn btn-success">Edit</button>
                      </td>
                      <td>
                        <button type="button" class="btn btn-danger">Delete</button>
                      </td>
                      
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>

            <button type="button" class="btn btn-success mt-2"><a href='{{route('stores.create')}}'>Create</button>
          </div>
        </div>
        </div>
@endsection