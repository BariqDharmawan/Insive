jQuery(function () {

    //global function
    function currentNav(navId) {
        let current = window.location.href.split('#')[0],
            nav = document.getElementById(navId),
            navItem = nav.getElementsByTagName('a');

        Array.from(navItem).filter(link => {
            if (link.href == current || link.href == decodeURIComponent(current)) link.classList.add("active")
        });
    }

    function getText(parent, target) {
        return parent.find(target).text().trim();
    }

    function setValue(parent, target, value) {
        return parent.find(target).val(value);
    }

    function getText(parent, target) {
        return parent.find(target).text().trim();
    }

    function setValue(parent, target, value) {
        return parent.find(target).val(value);
    }

    // function formattingCurrency(targetInput, value = 0) {
    //     new AutoNumeric(targetInput, value, {
    //         digitGroupSeparator: ',',
    //         decimalPlaces: '0'
    //     });
    // }
    currentNav('adminSidebar');

    //global script
    bsCustomFileInput.init();
    const select2 = $(".select2");

    select2.select2({
        placeholder: select2.data('placeholder'),
        allowClear: true
    });

    //script for #manageCatalogPage '/admin/product'
    const manageCatalogPage = $("#manageCatalogPage");
    const modalEditProduct = manageCatalogPage.find("#modal-edit-product");
    const modalAddProduct = manageCatalogPage.find("#modal-add");

    manageCatalogPage.find(".btn-show-modal-edit").on('click', function () {
        let product = $(this).closest('.product');
        let productId = $(this).data('id');
        let productName = getText(product, '.product__name');
        let productQty = getText(product, '.product__qty');
        let productPrice = product.find('td:nth-child(2) .product__price').data('price');
        let productTypeVal = getText(product, '.product__type');
        let formTarget = `formEditProduct${productId}`;
        // let inputPrice = modalEditProduct.find("input[name='price']")[0];

        modalEditProduct.find('form').attr({
            'id': formTarget,
            'action': `/admin/product/${productId}`
        });

        setValue(modalEditProduct, "input[name='product_name']", productName);
        setValue(modalEditProduct, "input[name='price']", productPrice);
        // formattingCurrency(inputPrice, productPrice);
        setValue(modalEditProduct, "input[name='qty']", productQty);
        setValue(modalEditProduct, ".select2", productTypeVal);

        modalEditProduct.find('button').attr('form', formTarget);
        modalEditProduct.find(".select2").trigger('change');
    });

    modalAddProduct.find("input, select").prop('required', true);

    manageCatalogPage.find("button[data-target='#modal-add']").on('click', function () {
        modalAddProduct.find("input:not([type='hidden']), select").val("");
        // formattingCurrency('#modal-add input[name="price"]');
    });

    manageCatalogPage.find('.alert').not('.alert-danger, .alert-secondary').delay(1000).slideUp("slow");

});
