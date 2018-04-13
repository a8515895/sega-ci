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
            <?php $this->load->view('default/titlePage',['title'=>'Thanh toán mua hàng']); ?>
            <div class="p10">
                <div class="row" style="margin : 20px 20px">
                    <div class="col-md-12">
                        <div style="position : relative">
                            <div  class="progress">
                                <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
                                </div>
                            </div>
                            <span class="label-process first">1</span>
                            <span class="label-title first"><a href="javascript:void(0)">Địa chỉ giao hàng</a></span>
                            <span class="label-process second">2</span>
                            <span class="label-title second"><a href="javascript:void(0)">Xác nhận đơn hàng</a></span>
                            <span class="label-process third">3</span>
                            <span class="label-title third"><a href="javascript:void(0)">Hoàn tất</a></span>
                        </div>
                        <div class="row" style="padding : 30px 0;border-bottom : 1px solid #e4e4e4">
                            <div class="col-md-12" >
                                <h3 class="center">Hoàn tất đơn hàng</h3>
                                <h3 class="center">Nhân viên hỗ trỡ sẽ gọi lại ngay</h3>
                                <p class="center"><i>Quay về trong <span id="number">5</span> giây</i></p>
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
        setInterval(function(){
            var number = Number($("#number").html());
            if(number == 0) loadUrl();
            else{
                number--;
                $("#number").html(number)
            }
        }, 1000);
    })
</script>
<style>
    .label-process{
        display: block;
        width: 30px;
        height: 30px;
        position: absolute;
        background: #de2727;
        top: -5px;
        border-radius: 100%;
        color : #fff;
        text-align : center;
        font-weight : bold;
        line-height : 2;
    }
    .label-title{
        display: block;
        position: absolute;
        bottom: -25px;
        font-weight: bold;
    }
    .label-title.first{
        left: -40px;
    }
    .label-title.first>a{
        color: #de2727;
    }
    .label-process.first{
        background: #de2727;
        left: -5px;
    }
    .label-title.second{
        left: 45%;
    }
    .label-title.second>a{
        color: #de2727;
    }
    .label-process.second{
        background: #de2727;
        left: 49%;
    }
    .label-title.third{
        right: -10px;
    }
    .label-title.third>a{
        color: #de2727;
    }
    .label-process.third{
        background: #de2727;
        right: -1px;
    }
    .row{
        margin-bottom : 10px
    }
</style>