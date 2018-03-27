<form id="formUpdate" method="post" enctype="multipart/form-data">
    <div class="modal-body">   
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-3 b">Danh Mục</div>
            <div class="col-md-9">
                <select name="category" class="select_category form-control" style="width : 100%">
                    <?php foreach($listCate as $cate){
                        if($cate['id'] == $product->id_category){
                            echo "<option value='$cate[id]' selected>$cate[name]</option>";
                        }
                        else{
                            echo "<option value='$cate[id]'>$cate[name]</option>";
                        }
                    }
                    ?>
                </select>
            </div>
        </div>                     
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-3 b">Tên <?=$title?></div>
            <div class="col-md-9">
                <input required type="hidden" class="form-control" name="id" value="<?=$product->id?>">
                <input required class="form-control" name="name" value="<?=$product->name?>">
            </div>
        </div>
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-3 b">Giá tiền</div>
            <div class="col-md-9">
                <input required type="number" class="form-control" name="price" value="<?=$product->price?>">
            </div>
        </div>   
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-3 b">Hình cũ</div>
            <div class="col-md-9" style="max-height : 200px;overflow : auto">
                <img src="<?=base_url("public/img/product/").$product->img?>" style="width : 100%" width="100%"/>
            </div> 
        </div>
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-3 b">Hình ảnh</div>
            <div class="col-md-3">
                <button id="chooseImg2" class="btn btn-link" type="button">Chọn hình</button>
                <input data-target="chooseImg2" style="display : none" type="file" name="img" onchange="readURL(this,'#blah2');" />
            </div>
            <div class="col-md-6" style="max-height : 200px;overflow : auto">
                <img style="width : 100%" id="blah2" width="100%"/>
            </div>                            
        </div>                     
    </div>
    <div class="modal-footer">
        <button id="updateProduct" type="submit" class="btn btn-primary">Save changes</button>
    </div>
</form>
<script>
    $(document).ready(function(){
        $("#chooseImg2").click(function(){
            $("input[data-target='chooseImg2']").click();
        })
        $("#updateProduct").click(function(e){
            e.preventDefault();
            var form = $('#formUpdate');
            var formData = new FormData(form[0]);
            $.ajax({
                type: 'post',
                url: url+'updateProduct',
                data: formData,
                contentType: false, 
                processData: false,
                success: function (kq) {
                    if(kq == 1){
                        toastr.success("Thay đổi sản phẩm thành công");
                        loadHrefAgain();
                    }else{
                        <?php if(!empty($this->session->flashdata())){ echo $this->session->flashdata("err"); } ?>
                        toastr.error("Thay đổi sản phẩm thất bại");
                    }
                }
            });
        });
    })
</script>