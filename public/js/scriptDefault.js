function addCart(id,index=false){
    if(index)  qty = $("#qty").val();
    else qty = 1;
    $.ajax({
        method : 'POST',
        url : url+'addCart',
        data : {id : id,qty : qty},
        success : function(kq){
            loadCountCartItem();
            reloadAjaxView();
            toastr.success("Thêm giỏ hàng thành công");
        }
    })
}
function loadCountCartItem(){
    $.ajax({
        method : 'get',
        url : url+'CountCartItem',
        success : function(kq){
            $("#cartBadge").html(kq);
        }
    })
}
function reloadAjaxView(){
    $.ajax({
        method : 'get',
        url : url+'ajaxCartView',
        success : function(kq){
            $("#cartAjaxView").html(kq);
        }
    })
}
function deleteItem(rowid){
    $.ajax({
        method : 'get',
        url : url+'deleteItem',
        data : {rowid : rowid},
        success : function(kq){
            location.reload();
        }
    })
}