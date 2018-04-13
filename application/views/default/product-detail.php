<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link href="<?=base_url("public/css/bootstrap.min.css")?>" rel="stylesheet">
        <link href="<?=base_url("public/css/bootstrap-theme.min.css")?>" rel="stylesheet">
        <link href="<?=base_url("public/plugin/toast/toast.min.css")?>" rel="stylesheet">
        <link href="<?=base_url("public/css/fontawesome-all.min.css")?>" rel="stylesheet">
        <link href="<?=base_url("public/plugin/dataTable/dataTable.min.css")?>" rel="stylesheet">
        <link href="<?=base_url("public/plugin/select2/select2.min.css")?>" rel="stylesheet">
        <link href="<?=base_url("public/css/reset.css")?>" rel="stylesheet">
        <link href="<?=base_url("public/css/style.css")?>" rel="stylesheet">        
        <title>Sega Tea</title>
    </head>
    <body style="background : url(<?=base_url('public/img/background-tea-default.png')?>) center repeat-y">
        <?php $this->load->view('default/header'); ?>
        <div class="container-default">
            <?php $this->load->view('default/titlePage',['title'=>'Chi tiết sản phẩm']); ?>
            <div class="p10">
                <div class="row" style="height : 350px">
                    <div class="col-md-4 h100">
                        <div class="content-product-img-detail">
                            <img class="img" src="<?=base_url('public/img/product/').$product->img?>" />
                        </div>
                    </div>
                    <div class="col-md-8 h100">
                        <div class="col-md-6">
                            <div class="w100 title" style="border-bottom : 1px solid #2a2f56">
                                <?=$product->name?>
                            </div>
                            <div class="w100 title" style="margin-top : 10px;border-bottom : 1px solid #2a2f56">
                                <p><?=number_format($product->price)?> VND</p>
                                <p>
                                    <button class="btn" style="background : #bb2460;color : #fff"><i class="fas fa-heart"></i> Yêu thích</button>
                                    <button class="btn btn-info" style="color : #fff"><i class="fas fa-share-alt"></i> Chia sẻ</button>
                                </p>
                            </div>
                            <div style="margin-top : 10px">
                                <div class="pull-left" style="display : flex">
                                    <span id="btnPlus" style="border : 1px solid #ccc;border-right : 0;height : 50px;width : 50px;text-align : center;display : inline-block;line-height : 3;cursor : pointer">+</span>
                                    <span  style="height : 50px;width : 100px;text-align : center;display : inline-block">
                                        <input style="height : 50px;width : 100px;text-align : right" id="qty" type="number" value='1' min='1'/>
                                    </span>
                                    <span id="btnMinus" style="border : 1px solid #ccc;border-left : 0;height : 50px;width : 50px;text-align : center;display : inline-block;line-height : 3;cursor : pointer">-</span>
                                </div>
                                <div class="pull-right">
                                    <button id="btnAddCart" class="btn" style="color : #fff;background :#2a2f56;font-size : 16px" onclick="addCart('<?=$product->id?>',$('#qty').val())"><i class="fas fa-cart-plus"></i> Thêm vào giỏ hàng</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="w100" style="height : 50px;background : #fba12c">
                                <div style="height: 100%;width: 50px;border-left: 26px solid #fff;border-right: 23px solid #fba12c;border-top: 24px solid #fff;border-bottom: 25px solid #fba12c;float:left"></div>
                                <div class="pull-right" style="color : #fff;line-height : 2px;margin-top: 6px;margin-right: 15px;">
                                    <i class="fas fa-shopping-cart fa-2x"></i>
                                    <span style="font-weight : bold">Giỏ Hàng</span>
                                </div>
                            </div>
                            <div class="w100" style="border : 10px solid #f4f4f4;min-height : 250px">
                                <div id="cartAjaxView">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php $this->load->view('default/footer'); ?>
    </body>
    <script src="<?=base_url("public/js/jquery-3.3.1.min.js")?>"></script>
    <script src="<?=base_url("public/js/bootstrap.min.js")?>"></script>
    <script src="<?=base_url("public/plugin/toast/toast.min.js")?>"></script>
    <script src="<?=base_url("public/plugin/dataTable/dataTable.min.js")?>"></script>
    <script src="<?=base_url("public/plugin/select2/select2.min.js")?>"></script>
</html>
<script>
    const url = '<?=base_url("home/")?>';
</script>
<script src="<?=base_url("public/js/scriptDefault.js")?>"></script>
<script>
    $(document).ready(function(){
        $.ajax({
            method : 'get',
            url : url+'ajaxCartView',
            success : function(kq){
                $("#cartAjaxView").html(kq);
            }
        })
        $("#btnAddCart").click(function(){
            $.ajax({
                method : 'get',
                url : url+'ajaxCartView',
                success : function(kq){
                    $("#cartAjaxView").html(kq);
                }
            })
        })
        $("#btnPlus").click(function(){
            var val=$("#qty").val();
            val++;
            $("#qty").val(val);
        })
        $("#btnMinus").click(function(){
            var val=$("#qty").val();
            if(val > 1){
                val--;
                $("#qty").val(val);
            }

        })
    })
</script>