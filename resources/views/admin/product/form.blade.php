<div class="form-group">
    @input([
        'type' => 'text',
        'name' => 'product_name',
        'placeholder' => 'Product Name',
        'value' => $product->product_name ?? old('product_name'),
        'ariaDesc' => 'productName',
        'labelText' => 'Product name',
        'isRequired' => true
    ])
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

    @input([
        'type' => 'number',
        'name' => 'qty',
        'placeholder' => 'Qty',
        'ariaDesc' => 'qty',
        'value' => $product->qty ?? old('qty'),
        'labelText' => 'Product Quantity',
        'min' => 1,
        'max' => 999,
        'isRequired' => true
    ])

</div>
<div class="form-group">
    <label for="product-type">Product Type</label>
    <select class="form-control select2" name="type" 
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