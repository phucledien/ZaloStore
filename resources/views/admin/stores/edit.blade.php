@extends ('admin.layouts.master')

@section ('content')
    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('dashboard') }}">Dashboard</a>
            </li>
            <li class="breadcrumb-item">
                <a href="{{ route('stores.index') }}">Stores</a>
            </li>
            <li class="breadcrumb-item active">Edit Store</li>
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
                Add New Store
            </div>
            <div class="card-body">

                <form method="POST" action="{{ route('stores.update', ['store' => $store->id]) }}">
                    @method('PATCH')
                    @csrf
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $store->name }}">
                    </div>

                    <div class="form-group">
                        <label for="oa_id">OA_ID</label>
                        <input type="text" class="form-control" id="oa_id" name="oa_id" value="{{ $store->oa_id }}">
                    </div>
                    
                    <div class="form-group">
                        <label for="oa_secret">OA_SECRET</label>
                        <input type="text" class="form-control" id="oa_secret" name="oa_secret" value="{{ $store->oa_secret }}">
                    </div>
                    
                    <button type="submit" class="btn btn-primary mt-2">Update store</button>
                </form>
            </div>
        </div>
    </div>
       
@endsection