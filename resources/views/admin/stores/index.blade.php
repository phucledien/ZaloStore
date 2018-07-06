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
          <div class="card-header d-flex">

              <span class="mr-auto">Products</span>
              <form class="form-inline" action="">
                <div class="form-group mr-3">
                  <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="Search" placeholder="Search">
                </div>
                <div class="form-group">
                  <button class="btn btn-outline-secondary" type="button">Button</button>
                </div>
              </form>

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
                        <a href="{{ route('stores.select', ['store' => $store]) }}" class="btn btn-info">Select</a>
                      </td>
                      @else
                      <td>
                        <button type="button" class="btn btn-info" disabled>Select</button>
                      </td>
                      @endif
                      <td>
                        <a href="{{ route('stores.edit', ['store' => $store->id]) }}" class="btn btn-success">Edit</a>
                      </td>
                      <td>
                        <form action="{{ route('stores.destroy', ['store' => $store->id]) }}" method="POST">
                          @method('DELETE')
                          @csrf
                          <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                      </td>
                      
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>

            <a class="btn btn-primary mt-2" href='{{ route('stores.create') }}'>Add New Store</a>
          </div>
    </div>

  </div>
@endsection