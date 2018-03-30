<div class="row">
    <div class="col-md-6">
        <h3 style="font-weight : bold;color : #33ce78">DANH SÁCH <?=mb_strtoupper($title)?></h3>
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
                    <form id="formAdd" method="post" enctype="multipart/form-data">
                        <div class="modal-body">   
                            <div class="row" style="margin-bottom: 10px">
                                <div class="col-md-3 b">Danh Mục</div>
                                <div class="col-md-9">
                                    <select name="category" class="select_category form-control" style="width : 100%">
                                        <?php foreach($listCate as $cate){
                                            echo "<option value='$cate[id]'>$cate[name]</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>                     
                            <div class="row" style="margin-bottom: 10px">
                                <div class="col-md-3 b">Tên <?=$title?></div>
                                <div class="col-md-9">
                                    <input class="form-control" name="name">
                                </div>
                            </div>
                            <div class="row" style="margin-bottom: 10px">
                                <div class="col-md-3 b">Giá tiền</div>
                                <div class="col-md-9">
                                    <input type="number" class="form-control" name="price">
                                </div>
                            </div>   
                            
                            <div class="row" style="margin-bottom: 10px">
                                <div class="col-md-3 b">Hình ảnh</div>
                                <div class="col-md-3">
                                    <button id="chooseImg" class="btn btn-link" type="button">Chọn hình</button>
                                    <input data-target="chooseImg" style="display : none" type="file" name="img" onchange="readURL(this);" />
                                </div>
                                <div class="col-md-6" style="max-height : 200px;overflow : auto">
                                    <img style="width : 100%" id="blah" width="100%"/>
                                </div>                            
                            </div>                     
                        </div>
                        <div class="modal-footer">
                            <button id="addProduct" type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
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
                    <th>Hình sản phẩm</th>
                    <th>Loại sản phẩm</th>
                    <th>Tên sản phẩm</th>
                    <th>Giá tiền</th>
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
                        <td data="img"><img src="<?=base_url("public/img/product/".$it['img'])?>" alt="<?=$it['name']?>" width="100px"/></td>
                        <td data="id_ccategory"><?=$it['cateName']?></td>
                        <td data="name"><?=$it['name']?></td>
                        <td data="price"><?=number_format($it['price'])?></td>
                        <td data="create_by"><?=ucfirst($it['createName'])?></td>
                        <td data="create_at"><?=date("d/m/Y",$it['create_at'])?></td>
                        <td data="update_by"><?=ucfirst($it['updateName'])?></td>
                        <td data="update_at"><?php if(!empty($it['update_at'])) echo date("d/m/Y",$it['update_at'])?></td>
                        <td><button class="btn btn-danger" onclick="confirmDelete('<?=$it['id']?>','deleteProduct')">Xóa</button> | <button data-toggle="modal" data-target="#myModal2" class="btn btn-warning" onclick="editButton(this,true,{url: 'getDetailProduct',id : '<?=$it['id']?>',html : '#modal-get-product'})">Sửa</button></td>
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
            <div id="modal-get-product"></div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        $("#chooseImg").click(function(){
            $("input[data-target='chooseImg']").click();
        })
        $(".table").DataTable({
            dom: 
            "<'row'<'col-sm-3'f><'col-sm-7'B><'col-sm-2'>>" +
            "<'row'<'col-sm-12'tr>>" +
            "<'row'<'col-sm-4'l><'col-sm-4'i><'col-sm-4'p>>",
        });
        $("#addProduct").click(function(e){
            e.preventDefault();
            var form = $('#formAdd');
            var formData = new FormData(form[0]);
            $.ajax({
                type: 'post',
                url: url+'insertProduct',
                data: formData,
                contentType: false, 
                processData: false,
                success: function (kq) {
                    if(kq == 1){
                        toastr.success("Thêm sản phẩm thành công");
                        loadHrefAgain();
                    }else{
                        <?php if(!empty($this->session->flashdata())){ echo $this->session->flashdata("err"); } ?>
                        toastr.error("Thêm sản phẩm thất bại");
                    }
                }
            });
        });

        $(".select_category").select2();
    })
    
</script>
<style>
div.dataTables_wrapper div.dataTables_filter {
    text-align: left;
}
</style>