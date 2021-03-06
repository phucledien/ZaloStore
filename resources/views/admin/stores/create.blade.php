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
            <li class="breadcrumb-item active">Add Store</li>
        </ol>

        <div class="card mb-3">
            <div class="card-header">
                Add New Store
            </div>
            <div class="card-body">

                <form method="POST" action="{{ route('stores.store') }}">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name">
                    </div>

                    <div class="form-group">
                        <label for="oa_id">OA_ID</label>
                        <input type="text" class="form-control" id="oa_id" name="oa_id">
                    </div>
                    
                    <div class="form-group">
                        <label for="oa_secret">OA_SECRET</label>
                        <input type="text" class="form-control" id="oa_secret" name="oa_secret">
                    </div>
                    
                    <button type="submit" class="btn btn-primary mt-2">Add new</button>
                </form>
            </div>
        </div>
    </div>
       
@endsection