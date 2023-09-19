
<div class="card-header-tabs">
    <div class="btn btn-group">
        <p> <a href="#" class="left btn btn-success">SAVE</a></p>
    </div>
</div>
<div class="card col-md-12">

    <div class="card-header">
        <h3 class="card-title">ADD list</h3>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-10">
                <form action="/product/add" method="post" data-toggle="validator">
                    <div class="mb-3">
                        <label class="form-label">Product Code</label>
                        <input type="text" class="form-control" name="productCode" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Product name</label>
                        <input type="text" class="form-control" name="productName" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Category</label>
                        <input type="text" class="form-control" name="productLine" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Product Scale</label>
                        <input type="text" class="form-control" name="productScale" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Product Vendor</label>
                        <input type="text" class="form-control" name="productVendor" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <input type="text" class="form-control" name="productDescription" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">QuantityInStock</label>
                        <input type="text" class="form-control" name="quantityInStock" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Buye price</label>
                        <input type="text" class="form-control" name="buyPrice" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">MSRP</label>
                        <input type="text" class="form-control" name="msrp" required>
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Check me out</label>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>

