import * as Helper from './helper.js';

jQuery(function () {

    // script for sidebar
    $("#show-menu").on('click', function (e) {
        Helper.disableEvent(e);
        $("nav").addClass("menu-visible");
    });

    $("#close-menu").on('click', function (e) {
        Helper.disableEvent(e);
        $("nav").removeClass("menu-visible");
    });
    // end of script for sidebar

    // script for #custom-fragrance-page
    const customFragrancePage = $("#custom-fragrance-page");
    customFragrancePage.find(".sheet").on('click', function () {
        if ($(this).hasClass('selected')) {
            //saat sheet di klik, tambah class selected dan hapus class selected di sheet lain
            $(this).removeClass("selected");
            //saat sheet di klik, trigger input di dlm nya jd checked
            $(this).children("figcaption").find("input[type='checkbox']").prop("checked", false);
            console.log($(this).children("figcaption").find("input[type='checkbox']").val());
        } else {
            //saat sheet di klik, tambah class selected dan hapus class selected di sheet lain
            $(this).addClass("selected");
            //saat sheet di klik, trigger input di dlm nya jd checked
            $(this).children("figcaption").find("input[type='checkbox']").prop("checked", true);
        }
    });

    // tambahin jumlah beli sheet
    let sheetQty = 0;
    let qtySheetInput;

    function getSheetQtyInput(fromElement) {
        return fromElement.parent().find('.sheet__qty');
    }

    customFragrancePage.find(".sheet__qty").val(0); // set default value to 0
    customFragrancePage.find('.product__button--increase').on('click', function (e) {
        Helper.disableEvent(e);

        qtySheetInput = getSheetQtyInput($(this));
        let currentQty = Number(qtySheetInput.val());
        let qtyIncreased = currentQty + 1;

        sheetQty += currentQty + 1;
        qtySheetInput.val(qtyIncreased);
    });

    // kurangin jumlah beli sheet
    customFragrancePage.find('.product__button--decrease').on('click', function (e) {
        Helper.disableEvent(e);

        qtySheetInput = getSheetQtyInput($(this));
        if ($(this).prev('input').val() > 0) {
            let qtyDecreased = Number(qtySheetInput.val()) - 1;

            sheetQty += Number(qtySheetInput) - 1;
            qtySheetInput.val(qtyDecreased);

        } else {
            qtySheetInput.val(0);
            //make qtyInput 0 if current qty is 0 and user click the .product__button--decrease
        }
    });

    customFragrancePage.find('.sheet .product__button').on('click', function () {
        const sheetDetail = $(this).parents('.sheet__detail');
        const sheetTotal = sheetDetail.find('.sheet__qty');
        const selectSheet = sheetDetail.find("input[type='checkbox']");

        if (sheetTotal.val() > 0) {
            selectSheet.prop('checked', true);
            $(this).parents(".sheet__detail").find('.sheet__select').prop("checked", true);

        } else {
            $(this).parents(".sheet__detail").find('.sheet__select').prop("checked", false);

        }
        console.log(sheetTotal.val());
    });

    // end of script for #custom-fragrance-page

    //script for #face-result-page
    $("#btnNextCustom").on('click', function (e) {
        if ($(".product__pick :checked").length === 0) {
            alert("you're not checked anything. Please check one")
            Helper.disableEvent(e);
        }
    });
    //end of script for #face-result-page

});
