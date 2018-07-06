@extends ('admin.layouts.master')

@section ('content')
    <div>

        <form>

            <div class="form-group">
                <label for="exampleFormControlInput1">Product name</label>
                <input type="text" class="form-control" id="productName">
            </div>

            <div class="form-group">
                <label for="exampleFormControlTextarea1">Description</label>
                <textarea class="form-control" id="productDescription" rows="3"></textarea>
            </div>

            <div class="input-group">
                <select class="custom-select" id="Categorys">
                    <option selected>Categorys</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                </select>

                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="button">Add</button>
                </div>

            </div>
        
            <div class="input-group">
                <select class="custom-select" id="Attributes">
                    <option selected>Attributes</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                </select>

                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="button">Add</button>
                </div>

            </div>

            <button type="button" class="btn btn-light">Public</button>
        </form>
    </div>

       
@stop