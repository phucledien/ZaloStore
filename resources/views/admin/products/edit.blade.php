@extends ('admin.layouts.master')

@section ('content')

    <div class="card mb-3 ml-3 mr-3">
        <div class="card-header">
            Create Product
        </div>
        <div class="card-body">

            <form>

                <div class="form-group">
                    <label>Product name</label>
                    <input type="text" class="form-control" id="productName">
                </div>

                <div class="form-group">
                    <label>Description</label>
                    <textarea class="form-control" id="productDescription" rows="3"></textarea>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="inputState">Categorys</label>
                        <select id="inputState" class="form-control">
                            <option selected>Choose...</option>
                            <option>...</option>
                        </select>
                    </div>
                    
                    <div class="form-group col-md-4">
                        <label for="inputState">Attributes</label>
                        <select id="inputState" class="form-control">
                            <option selected>Choose...</option>
                            <option>...</option>
                        </select>
                    </div>
                </div>

                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="validatedCustomFile" required>
                    <label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
                    <div class="invalid-feedback">Example invalid custom file feedback</div>
                </div>

                <button type="button" class="btn btn-success mt-2">Success</button>
            </form>
        </div>
    </div>
       
@endsection