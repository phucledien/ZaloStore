@extends ('admin.layouts.master')

@section ('content')

    <div class="card mb-3 ml-3 mr-3">
        <div class="card-header">
            Create Product
        </div>
        <div class="card-body">

            <form>

                <div class="form-group">
                    <label>Name</label>
                    <input type="text" class="form-control" id="productName">
                </div>

                <div class="form-group">
                    <label>OA_ID</label>
                    <input type="text" class="form-control" id="productName">
                </div>
                
                <div class="form-group">
                    <label>OA_SECRET</label>
                    <input type="text" class="form-control" id="productName">
                </div>

                
                <button type="button" class="btn btn-success mt-2">Create</button>
            </form>
        </div>
    </div>
       
@endsection