{{-- <form action="{{ $action }}" id="{{ $id }}" method="post" enctype="multipart/form-data"> --}}
    <div class="form-group">
        <label for="product-name">Product name</label>
        <input class="form-control" 
        id="product-name" name="product_name"
        type="text" placeholder="Product Name"
        value="{{ $product->product_name ?? old('product_name') }}" autocomplete="off"
        aria-describedby="productNameFeedback" required>
    </div>
    <div class="form-group">
        <label for="product-price">Product price</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <div class="input-group-text">Rp. </div>
            </div>
            <input class="form-control" 
            id="product-price" name="price" type="text" placeholder="Price" minlength="3" maxlength="50"
            value="{{ $product->price ?? old('price') }}" aria-describedby="productPriceFeedback" required>
        </div>
    </div>
    <div class="form-group">
        <label for="product-qty">Product Quantity</label>
        <input class="form-control" name="qty" type="number" min="1"
            max="1000000000" placeholder="Qty" value="{{ $product->qty ?? old('qty') }}"
            autocomplete="off" id="product-qty" aria-describedby="qtyFeedback" required>
    </div>
    <div class="form-group">
        <label for="product-type">Product Type</label>
        <select class="form-control select2" id="edit-product__type" name="type" 
        aria-describedby="typeFeedback" data-placeholder="Select a type" required>
            <option value=""></option>
            <option value="A">A</option>
            <option value="B">B</option>
            <option value="C">C</option>
        </select>
    </div>
    <div class="form-group">
        <div class="custom-file">
            <input type="file" name="product_img" id="product_image"
            class="custom-file-input">
            <label class="custom-file-label" for="product_image">
                Change Product Cover
            </label>
        </div>
    </div>
{{-- </form> --}}