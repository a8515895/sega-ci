function loadHref(it){
    $("#load").show();
    href = $(it).data("href");
    $(".href").removeClass("activeHref");
    $(it).addClass("activeHref");
    $.get(url+href,{},function(kq){
        $("#load").hide();
        $(".wrapper").html(kq)
    });
}
function loadHrefAgain(){
    $.get(url+href,{},function(kq){
        $("#load").hide();
        $(".wrapper").html(kq);
        $(".modal-backdrop").remove();
    });
}
function confirmDelete(id,mo){
    $.confirm({
        title: 'Xác nhận xóa!',
        content: 'Xóa sẽ ảnh hưởng rất nhìu, bạn chắc không',
        type: 'red',
        typeAnimated: true,
        buttons: {
            yes: function () {
                $.get(url+mo,{id : id},function(kq){
                    toastr.success("Xóa thành công");
                    loadHrefAgain();
                })
            },
            cancle: function () {
                
            }
        }
    })
}
function editButton(it,ajax = false,option = {}){
    if(!ajax){
        let json = new Array;
        $.each($(it).parent().parent("tr").children("td"),function(){
            if($(this).attr("data") != undefined){
                json[$(this).attr("data")]=$(this).html();
            }
        })
        $("#inputEditName").val(json['name']);
        $("#inputEditId").val(json['id']);
    }else{
        $.get(url+option.url,{id : option.id},function(kq){
            $(option.html).html(kq);
        })
    }    
}
function readURL(input,target='#blah') {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $(target)
                .attr('src', e.target.result)
        };

        reader.readAsDataURL(input.files[0]);
    }
}