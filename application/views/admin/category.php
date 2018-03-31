<div class="row">
    <div class="col-md-6">
        <h3 style="font-weight : bold;color : #33ce78">DANH SÁCH <?=strtoupper($title)?></h3>
    </div>
    <div class="col-md-6">
        <button data-toggle="modal" data-target="#myModal" style="margin-top: 15px;font-weight : 700" class="btn btn-success pull-right"><i class="fas fa-plus"></i> Thêm <?=$title?></button>
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header add" style="position : relative;background : #33ce78">
                        <button type="button" class="close-button-modal" data-dismiss="modal" aria-label="Close"><i class="fas fa-times"></i></button>
                        <h4 class="modal-title" id="myModalLabel" style="color: #fff;font-weight: bold;">Thêm <?=$title?></h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-3 b">Tên danh mục</div>
                            <div class="col-md-9">
                                <input class="form-control" name="name" id="createName" required>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button id="addCategory" type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class ="row"> 
    <div class="col-md-12">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Danh mục</th>
                    <th>Tạo bởi</th>
                    <th>Ngày tạo</th>
                    <th>Thay đổi bởi</th>
                    <th>Ngày thay đổi</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($list as $it){ ?>
                    <tr id="tr-<?=$it['id']?>">
                        <td data="id"><?=$it['id']?></td>
                        <td data="name"><?=$it['name']?></td>
                        <td data="create_by"><?=ucfirst($it['createName'])?></td>
                        <td data="create_at"><?=date("d/m/Y",$it['create_at'])?></td>
                        <td data="update_by"><?=ucfirst($it['updateName'])?></td>
                        <td data="update_at"><?php if(!empty($it['update_at'])) echo date("d/m/Y",$it['update_at'])?></td>
                        <td><button class="btn btn-danger" onclick="confirmDelete('<?=$it['id']?>','deleteCategory')">Xóa</button> | <button data-toggle="modal" data-target="#myModal2" class="btn btn-warning" onclick="editButton(this)">Sửa</button></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header edit" style="position : relative;background : #d6d631">
                <button type="button" class="close-button-modal" data-dismiss="modal" aria-label="Close"><i class="fas fa-times"></i></button>
                <h4 class="modal-title" id="myModalLabel" style="color: #fff;font-weight: bold;">Sửa <?=$title?></h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-3 b">Tên <?=$title?></div>
                    <div class="col-md-9">
                        <input type="hidden" class="form-control" name="name" id="inputEditId" required>
                        <input class="form-control" name="name" id="inputEditName" required>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button id="updateCategory" type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        $(".table").DataTable({
            dom: 
            "<'row'<'col-sm-3'f><'col-sm-7'B><'col-sm-2'>>" +
            "<'row'<'col-sm-12'tr>>" +
            "<'row'<'col-sm-4'l><'col-sm-4'i><'col-sm-4'p>>",
        });
        $("#addCategory").click(function(){
            if($("#createName").val() != "" && $("#createName").val() != null){
                $.post(url+"insertCategory",{name : $("#createName").val()},function(){
                    toastr.success('Thêm thành công');
                    $.get(url+'category',{},function(kq){
                        $("#load").hide();
                        $(".wrapper").html(kq);
                        $(".modal-backdrop").remove();
                    });
                })
            }else{
                toastr.error('Có lỗi xảy ra')
            }
        });
        $("#updateCategory").click(function(){
            if($("#inputEditName").val() != "" && $("#inputEditName").val() != null){
                $.ajax({
                    method : "post",
                    url : url+'updateCategory',
                    data: {id: $("#inputEditId").val(),name : $("#inputEditName").val(),},
                    success : function(kq){
                        toastr.success('Thay đổi thành công');
                        $.get(url+'category',{},function(kq){
                            $("#load").hide();
                            $(".wrapper").html(kq);
                            $(".modal-backdrop").remove();
                        });
                    }
                })
            }else{
                toastr.error('Có lỗi xảy ra')
            }
        });
    })
    
</script>
<style>
div.dataTables_wrapper div.dataTables_filter {
    text-align: left;
}
</style>