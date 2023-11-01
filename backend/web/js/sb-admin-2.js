$(function() {
    

    $('#side-menu').metisMenu();
    $('li .active').parent().parent().addClass('in')
    $('li .active').parent().parent().parent().addClass('active');
    
    $('.startday, .endday').datepicker({
        timepicker: true,
    });

    var date = new Date();
    date.setDate(date.getDate() - 1);

    $('#subusershotel-birthday, #orders-created_at, #orders-updated_at').datepicker({
        dateFormat: "yyyy-mm-dd",
        defaultDate: date,
        onSelect: function () {
            selectedDate = $.datepicker.formatDate("yyyy-mm-dd", $(this).datepicker('getDate'));
        },
    });


    $('#orders-check_in, #orders-check_out, #orders-time_meet').datetimepicker({
        language: 'vi-VN',
        dateFormat: "yyyy-mm-dd HH:mm:ss",
        defaultDate: date,
        onSelect: function () {
            selectedDate = $.datepicker.formatDate("yyyy-mm-dd HH:mm:ss", $(this).datepicker('getDate'));
        },
    });

    $("div.droptrue").on("dblclick", "div", function(event){
        updateBillDetail($(this));
        var price = parseInt($(this).children('a').data('price')) + parseInt($('#bill-totalprice').val());
        var priceText = price.toLocaleString('vi', {style : 'currency', currency : 'VND'});
        var currenItem = $('#sortable2').find("[data-key='" + $(this).data('key') + "']");
        if(currenItem.length > 0) {
            currenItem.children('a').find('.fa-plus').removeClass('fa-plus').addClass('fa-minus-circle');
            var count = parseInt(currenItem.children('a').find('.count').text());
            currenItem.children('a').find('.count').text(count + 1);
            currenItem.children('a').attr("data-quantity", count + 1);
            $('#sortable2').find("[data-key='" + $(this).data('key') + "']")
        } else {
            var item = $(this).clone();
            item.children('a').find('.fa-plus').removeClass('fa-plus').addClass('fa-minus-circle');
            item.children('a').append("<span class='count'>1</span>");
            item.children('a').attr("data-quantity", 1);
            item.children('a').append("<span class='remove btn-danger'><i class='fa fa-times'></i></span>");
            $('#sortable2').append(item);
        }
        countPrice = price;
        $('#bill-totalprice').val(price);
        $('.Totalprice').text(priceText);
        $(".remove").off().on("click", function(e){
            var itempRemove = parseInt($(this).parent().data('price')) * parseInt($(this).parent().data('quantity'));
            var totalprice = parseInt($('#bill-totalprice').val()) - itempRemove;
            $('#bill-totalprice').val(totalprice);
            var priceText = totalprice.toLocaleString('vi', {style : 'currency', currency : 'VND'});
            $('.Totalprice').text(priceText);
            deleteItemp($(this).parent().parent());
            $(this).parent().parent().remove();
        });
    });

    $(".remove").off().on("click", function(e){
        var itempRemove = parseInt($(this).parent().data('price')) * parseInt($(this).parent().data('quantity'));
        var totalprice = parseInt($('#bill-totalprice').val()) - itempRemove;
        $('#bill-totalprice').val(totalprice);
        var priceText = totalprice.toLocaleString('vi', {style : 'currency', currency : 'VND'});
        $('.Totalprice').text(priceText);
        deleteItemp($(this).parent().parent());
        $(this).parent().parent().remove();
    });

    $("#bill-sale").on('change keyup', function () {
        var textPrice;
        if ($(this).val() != "") {
            var salePrice = (parseInt($(this).val()) * parseInt($('#bill-totalprice').val())) / 100;
            salePrice = parseInt($('#bill-totalprice').val()) - salePrice;
            textPrice = salePrice.toLocaleString('vi', {style : 'currency', currency : 'VND'});
        } else {
            textPrice = parseInt(countPrice).toLocaleString('vi', {style : 'currency', currency : 'VND'});
        }
        $('.Totalprice').text(textPrice); 
    });
});

function deleteItemp(item) {
    var dataFrom = {
        'IdBill': $('#bill-idbill').val(),
        'IdMenu': item.data('key'),
        'IncrementId': $('#increment_id').val(),
        '_csrf' : $('meta[name="csrf-token"]').attr("content"),
    }
    $.ajax({
        url: "/orders/remove-item",
        type: "POST",
        data: dataFrom,
        dataType: 'json',
        success: function (response) {
            console.log(response)
        }
    });
}

function updateBillDetail(item) {
    var dataFrom = {
        'IdBill': $('#bill-idbill').val(),
        'IdMenu': item.data('key'),
        'Price': item.children('a').data('price'),
        'IncrementId': $('#increment_id').val(),
        '_csrf' : $('meta[name="csrf-token"]').attr("content"),
    }
    $.ajax({
        url: "/orders/add-item",
        type: "POST",
        data: dataFrom,
        dataType: 'json',
        success: function (response) {
            console.log(response)
        }
    });
}

//Loads the correct sidebar on window load,
//collapses the sidebar on window resize.
// Sets the min-height of #page-wrapper to window size
$(function() {
    $(window).bind("load resize", function() {
        topOffset = 50;
        width = (this.window.innerWidth > 0) ? this.window.innerWidth : this.screen.width;
        if (width < 768) {
            $('div.navbar-collapse').addClass('collapse')
            topOffset = 100; // 2-row-menu
        } else {
            $('div.navbar-collapse').removeClass('collapse')
        }

        height = (this.window.innerHeight > 0) ? this.window.innerHeight : this.screen.height;
        height = height - topOffset;
        if (height < 1) height = 1;
        if (height > topOffset) {
            $("#page-wrapper").css("min-height", (height) + "px");
        }
    })
})
