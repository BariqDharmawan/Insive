import * as Helper from './helper.js';

jQuery(function () {

    //global function

    Helper.currentNav('adminSidebar');

    //global script
    bsCustomFileInput.init();


    //script for #manageCatalogPage '/admin/product'

    const manageCatalogPage = $("#manageCatalogPage");
    const modalEditProduct = manageCatalogPage.find("#modal-edit-product");
    const modalAddProduct = manageCatalogPage.find("#modal-add");

    manageCatalogPage.find(".btn-show-modal-edit").on('click', function () {
        let product = $(this).closest('.product');
        let productId = $(this).data('id');
        let productName = Helper.getText(product, '.product__name');
        let productQty = Helper.getText(product, '.product__qty');
        let productPrice = product.find('td:nth-child(2) .product__price').data('price');
        let productTypeVal = Helper.getText(product, '.product__type');
        let formTarget = `formEditProduct${productId}`;
        // let inputPrice = modalEditProduct.find("input[name='price']")[0];

        modalEditProduct.find('form').attr({
            'id': formTarget,
            'action': `/admin/product/${productId}`
        });

        Helper.setValue(modalEditProduct, "input[name='product_name']", productName);
        Helper.setValue(modalEditProduct, "input[name='price']", productPrice);
        // formattingCurrency(inputPrice, productPrice);
        Helper.setValue(modalEditProduct, "input[name='qty']", productQty);
        Helper.setValue(modalEditProduct, ".select2", productTypeVal);

        modalEditProduct.find('button').attr('form', formTarget);
        modalEditProduct.find(".select2").trigger('change');
    });

    modalAddProduct.find("input, select").prop('required', true);

    manageCatalogPage.find("button[data-target='#modal-add']").on('click', function () {
        modalAddProduct.find("input:not([type='hidden']), select").val("");
        // formattingCurrency('#modal-add input[name="price"]');
    });

    manageCatalogPage.find('.alert').not('.alert-danger, .alert-secondary').delay(1000).slideUp("slow");

    //end of script for #manageCatalogPage '/admin/product'

    //script for #manageDiscountPage '/admin/product/manage-discount
    let discountProductName, discountProductPrice;
    let discountProductId;
    let discountUpdateUrl;
    let findValueByName;
    const formAddEditDisc = '#formAddDisc';

    $(".btn-confirm-delete, .btn-edit-discount").on('click', function () {
        const discountItem = $(this).parents(".discount")
        discountProductId = $(this).data('product-id')
        discountProductName = Helper.getText(discountItem, '.discount__product-name')

        if ($(this).hasClass('btn-confirm-delete')) {
            $("#modalDelConfirm__product-name").text(discountProductName)
            $("#modalDelConfirm__form").attr(
                'action', `/admin/product/manage-discount/${discountProductId}`
            )
        } else {
            // discountProductPrice = $(this).parents(".discount").find('.discount__product-price').text()
            discountProductPrice = Helper.getText(discountItem, '.discount__product-price')
            discountProductPrice = discountProductPrice.replace('Rp. ', '').replace(',', '').trim()

            discountUpdateUrl = $(this).data('update-url')
            findValueByName = $(formAddEditDisc + " #product-name")
                .find(`option:contains('${discountProductName}')`).val()
            $(formAddEditDisc).attr('action', discountUpdateUrl)
                .find('#product-name')
                .val(findValueByName)
                .trigger('change')

            Helper.setValue($(formAddEditDisc), 'input[name="discount_price"]', discountProductPrice)
        }
    });

    $("#modal-add-disc").on('hidden.bs.modal', function () {
        $(formAddEditDisc + " input, " + formAddEditDisc + " #product-name").val(null).trigger('change');
    });

});
