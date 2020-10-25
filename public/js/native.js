import * as Helper from './helper.js';

jQuery(function () {

    // script for sidebar
    const nav = $("nav");
    $("#show-menu").on('click', function (e) {
        Helper.disableEvent(e);
        nav.addClass("menu-visible");
    });

    $("#close-menu").on('click', function (e) {
        Helper.disableEvent(e);
        nav.removeClass("menu-visible");
    });
    // end of script for sidebar

    // script for #custom-fragrance-page
    const customFragrancePage = $("#custom-fragrance-page");
    // let pickFragrance;

    // customFragrancePage.find(".sheet").on('click', function () {
    //     pickFragrance = $(this).children("figcaption").find("input[type='checkbox']");

    //     if ($(this).hasClass('selected')) {
    //         //saat sheet di klik, tambah class selected dan hapus class selected di sheet lain
    //         $(this).removeClass("selected");
    //         //saat sheet di klik, trigger input di dlm nya jd checked
    //         pickFragrance.prop("checked", false);
    //         console.log(pickFragrance.val());
    //     } else {
    //         //saat sheet di klik, tambah class selected dan hapus class selected di sheet lain
    //         $(this).addClass("selected");
    //         //saat sheet di klik, trigger input di dlm nya jd checked
    //         pickFragrance.prop("checked", true);
    //     }
    // });

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

    let sheetDetail, sheetTotal, selectSheet, sheetSelect;
    customFragrancePage.find('.sheet .product__button').on('click', function () {
        sheetDetail = $(this).parents('.sheet__detail');
        sheetTotal = sheetDetail.find('.sheet__qty');
        selectSheet = sheetDetail.find("input[type='checkbox']");
        sheetSelect = sheetDetail.find('.sheet__select');

        if (sheetTotal.val() > 0) {
            selectSheet.prop('checked', true);
            sheetSelect.prop("checked", true);

        } else {
            sheetSelect.prop("checked", false);

        }
        console.log(sheetTotal.val());
    });

    // end of script for #custom-fragrance-page

    //script for #face-result-page
    $("#btnNextCustom").on('click', function (e) {
        if ($(".product__pick:checked").length === 0) {
            alert("you're not checked anything. Please check one")
            Helper.disableEvent(e);
        }
    });
    //end of script for #face-result-page

});
