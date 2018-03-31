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
        <header>
            <div style="width : 70%;margin : auto">
                <ul>
                    <li><a href="javascript:void(0)"><i class="fas fa-home"></i> Home</a></li>
                    <li><a href="javascript:void(0)"><i class="fas fa-phone"></i> Hotline: 1900xxxx</a></li>
                    <li><a href="javascript:void(0)"><i class="fas fa-envelope-open"></i> Mail: axxxx@gmail.com</a></li>
                </ul>
                <ul class="pull-right">
                    <li><a href="javascript:void(0)"><i class="fas fa-user-plus"></i> Đăng ký | </a></li>
                    <li><a href="javascript:void(0)"><i class="fas fa-user-md"></i> CSKH | </a></li>
                    <li><a href="javascript:void(0)"><i class="fas fa-mobile-alt"></i> Liên hệ | </a></li>
                    <li><a href="javascript:void(0)"><i class="fab fa-facebook-f"></i></a></li>

                </ul>
                <div class="clear"></div>
            </div>
        </header>
        <div class="container-default p10">
            <div class="row" style="height : 350px">
                <div class="col-md-5 h100">
                    <div class="content-product-img-detail">
                        <img class="img" src="<?=base_url('public/img/product/').$product->img?>" />
                    </div>
                </div>
                <div class="col-md-7 h100">
                    <div class="col-md-7">
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
                            <div class="pull-left">
                                <span style="border : 1px solid #ccc;height : 50px;width : 50px;text-align : center;display : inline-block">+</span>
                                <span style="border : 1px solid #ccc;height : 50px;width : 100px;text-align : center;display : inline-block">
                                    <input style="height : 50px;width : 100px"/>
                                </span>
                                <span style="border : 1px solid #ccc;height : 50px;width : 50px;text-align : center;display : inline-block">-</span>
                            </div>
                            <div class="pull-right">
                                <button class="btn" style="color : #fff;background :#2a2f56">Thêm vào giỏ hàng</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5"></div>
                </div>
            </div>
        </div>
        <footer></footer>
    </body>
    <script src="<?=base_url("public/js/jquery-3.3.1.min.js")?>"></script>
    <script src="<?=base_url("public/js/bootstrap.min.js")?>"></script>
    <script src="<?=base_url("public/plugin/toast/toast.min.js")?>"></script>
    <script src="<?=base_url("public/plugin/dataTable/dataTable.min.js")?>"></script>
    <script src="<?=base_url("public/plugin/select2/select2.min.js")?>"></script>
</html>
<script>
    const url = '<?=base_url("admin/")?>';
</script>
<script src="<?=base_url("public/js/scriptAdmin.js")?>"></script>
<script>
    $(document).ready(function(){
        $.get(url+'dashboard',{},function(kq){
            $("#load").hide();
            $(".wrapper").html(kq)
        }); 
      
        <?php if(!empty($this->session->flashdata())){ echo $this->session->flashdata("login"); } ?>
    })
</script>