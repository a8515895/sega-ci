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
        <div style="width : 100%;margin : 10px auto">
            <div id="carousel-example-generic"  class="carousel slide" data-ride="carousel">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                </ol>

                <!-- Wrapper for slides -->
                <div class="carousel-inner" role="listbox" style="height : 500px">
                    <div class="item active">
                        <img src="<?=base_url("public/img/green-tea500.png")?>" alt="green-tea" >
                    <div class="carousel-caption">
                        ...
                    </div>
                    </div>
                    <div class="item">
                        <img src="<?=base_url("public/img/green-tea500.png")?>" alt="green-tea">
                    <div class="carousel-caption">
                        ...
                    </div>
                    </div>
                    ...
                </div>

                <!-- Controls -->
                <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
        <div class="w100" style="padding : 20px 0">
            <?php foreach($category as $cate){ ?>
                <div class="wrapper-content">
                    <div class="wrapper-left">
                        <img src="<?=base_url('public/img/tea-1.png')?>" style="height: 100%" height="100%">
                    </div>
                    <div class="wrapper-right">
                        <div class="wrapper-header">
                            <a href="javascript:void(0)">
                                <?=strtoupper($cate['name'])?>
                            </a>
                        </div>
                        <div class="wrapper-contain">
                            <?php foreach($product[$cate['name']] as $pro){ ?>
                                <div class="wrapper-item">
                                    <div class="item-content-img">
                                        <div class="item-img">
                                            <img src="<?=base_url("public/img/product/$pro[img]")?>" style="height: 100%" height="100%">
                                        </div>
                                    </div>
                                    <div class="item-price">
                                        <a href="javascript:void(0)"><?=$pro['name']?></a>
                                        <a href="javascript:void(0)" style="color : red"><?=number_format($pro['price'])?></a>
                                        <a class="btn btn-success pull-right" href="javascript:void(0)">Thêm giỏ hàng</a>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
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