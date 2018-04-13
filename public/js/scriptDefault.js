function addCart(id,qty){
    alert(qty);
    if(qty == '' || qty == null || qty < 1) qty = 1;
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
function clickForm(idForm,urlAjax,option){
    var form = $('form#'+idForm);
    var formData = new FormData(form[0]);
    $.ajax({
        type: 'post',
        url: url+urlAjax,
        data: formData,
        contentType: false, 
        processData: false,
        success: function (kq) {                    
            if(kq == 0) {
                if(option.url == null ||  option.url == ''){
                    window.location.href = url;
                }
                else{
                    if(option.url != 'none')
                    window.location.href = option.url;                    
                }
            }
            else{
                res=$.parseJSON(kq);
                toastr.error(res.err,option.title);
            }
        }
    });
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
function loadUrl(urlLoad = ''){
    if(urlLoad == '' || urlLoad == null) urlLoad = url
    window.location.href = urlLoad;                    
}