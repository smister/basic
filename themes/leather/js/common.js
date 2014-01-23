/**
 * @author Lujie.Zhou(gao_lujie@live.cn, qq:821293064).
 */
/**
 * add favorite
 * @param sURL
 * @param sTitle
 * @constructor
 */
function addFavorite() {
    var url = window.location.hostname;
    var title = document.title;
    try {
        window.external.addFavorite(url, title);
    }
    catch (e) {
        try {
            window.sidebar.addPanel(title, url, "");
        }
        catch (e) {
            showPopup("加入收藏失败，请使用Ctrl+D进行添加");
        }
    }
}

$(document).ready(function () {
    $("#account").click(function () {
        if ($(this).attr('class') == 'btn1') {
            $("#cartForm").submit();
        }
    });
    $("#cart-table").on("change", "input[type=text][id=quantity]", function () {
        var tr = $(this).closest('tr');
        var sku_id = tr.find("#position");
        var qty = tr.find("#quantity");
        var item_id = tr.find(".item-id");
        var props = tr.find(".props");
        var cart=parseInt($(".shopping_car").find("span").html());
       var sumPrice= parseFloat($("#SumPrice").html());
        var singlePrice=parseFloat( tr.find("#Singel-Price").html());
        // check input data
//            alert(props.val());
//            if (!/^\d+$/.test(qty)) {
//                return;
//            }
        $.get($(this).data('url'), {'sku_id': sku_id.val(), 'qty': qty.val(), 'item_id': item_id.val(), 'props': props.val()}, function (response) {
//             window.location.reload();
            $("#error-message").remove();
            if (!response) {
                $(".shopping_car").find("span").html(cart-sumPrice/singlePrice+parseInt(qty.val()));
                tr.find("#SumPrice").html(parseFloat(qty.val()) * parseFloat(singlePrice));
            }
            $("#stock-error").append(response);
        });
    });
//    $("#cart-table").on("keyup", "input[type=text][id=quantity]", function () {
//       var $sku_id=$("#position").val();
//        var $this = $(this),
//                      $tr = $this.closest('tr'),
//            props = $tr.find('.props'),
//            tempId = $tr.find('.item-id'),
//            qty = $.trim(this.value);
//        clearTimeout(window.delay);
//        window.delay = setTimeout(function () {
//            $this.blur();
//            // check input data
//            if (!/^\d+$/.test(qty)) {
//                return;
//            }
//            var html = '<input type="hidden" name="hid" value="0">';
//            // compare number
//            if (parseInt(qty) <= parseInt($this.data('num'))) {
//                $.post($(this).data('url'), {'item_id': tempId,'sku_id':$sku_id, 'props': props, 'qty': qty}, function (response) {
////             window.location.reload();
//$("#stock-error").append(response);
//                }, 'json');
//            } else {
//                var s = "库存不足，请更改物品数量！";
//                document.write(s);
////                show error
//            }
//        }, 1500);
//    });
//    $('[name="quantity[]"]').change(function () {
//        var item_id = $(this).parents('tr').find('[name="item_id[]"]').val();
//        var props = $(this).parents('tr').find('[name="props[]"]').val();
//        var qty = $(this).val();
//        var data = {'item_id': item_id, 'props': props, 'qty': qty};
//        $.get($(this).data('url'), data, function (response) {
////            window.location.reload();
//        }, 'json');
//    });
    $('#cartForm').on('click', '[name="position[]"],#checkAllPosition', function () {
        var flag = 0;
        var submit = $("#account");
        if ($(this).attr("id") == "checkAllPosition") {
            if ($(this).attr('checked')) {
                $('[name="position[]"]').attr('checked', 'checked');
            } else {
                $('[name="position[]"]').removeAttr('checked');
                flag = 0;
            }
        } else {
            $('#checkAllPosition').removeAttr('checked');
            if ($(this).attr("checked")) {
                $(this).attr("checked", "checked");
            } else {
                $(this).removeAttr("checked");
                flag = 0;
            }
        }
        var positions = [];
        $('[name="position[]"]:checked').each(function () {
            positions.push($(this).val());
            flag = 1;
        });
        if (flag == 1) {
            submit.removeClass();
            submit.addClass("btn1");
        } else {
            submit.removeClass();
            submit.addClass("btn");
        }
        $.get($(this).data('url'), {'positions': positions}, function (response) {
            if (!response.msg) {
                $('#total_price').text(response.total);
            }
        }, 'json');

    });
});
