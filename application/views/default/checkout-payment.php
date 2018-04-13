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
                    <div class="col-md-7">
                        <div style="position : relative">
                            <div  class="progress">
                                <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 50%">
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
                                <h3 style="color : #2d3877">Thông tin giao hàng</h3>
                                <p><span class="b f16">Họ và tên : </span><?=$checkout['name']?></p>
                                <p><span class="b f16">Địa chỉ : </span><?=$checkout['address']?>, phường <?=$checkout['ward']?>, quận <?=$checkout['district']?>, <?=$checkout['province']?></p>
                                <p><span class="b f16">Điện thoại : </span><?=$checkout['phone']?></p>
                                <?php if(!empty($checkout['note'])){ ?>
                                    <p><span class="b f16">Ghi chú : </span><?=$checkout['note']?></p>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="row" style="margin-top : 10px">
                            <h3 style="color : #2d3877">Hình thức thanh toán</h3>
                            <div class="col-md-12" style="border : 1px solid #e4e4e4;padding : 10px;margin-bottom : 20px">
                                <label><input type="radio" name="hinhthuc" value="nhanhang" checked/> Thành toán khi nhận hàng</label>
                            </div>
                            <div class="col-md-12" style="border : 1px solid #e4e4e4;padding : 10px">
                                <label><input type="radio" name="hinhthuc" value="chuyenkhoan"/> Thành toán khi chuyển khoản</label>
                            </div>
                            <div class="col-md-12" style="padding : 0">
                                <p>Bạn vui lòng <b>KIỂM TRA</b> lại đơn hàng trước khi <b>ĐẶT MUA</b></p>
                                <p><a href="<?=base_url("checkout/success")?>" class="btn btn-danger f20 b" style="color : #fff">Xác nhận thanh toán</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="row">
                            <div class="col-md-12 f20 b" style="color : #2d3877">Thông tin giỏ hàng</div>
                            <table class="w100">
                                <?php foreach ($this->cart->contents() as $items){ ?>
                                    <tr style="border-bottom : 1px solid #e4e4e4">
                                        <td>
                                            <a href="<?=base_url('product/').$items['options']['none_name']?>" style="display : inline-block">
                                                <div class="content-product-img-detail" style="height : 100px;width : 100px">
                                                        <img src="<?=base_url("public/img/product/").$items['options']['img']?>" class="img"/>
                                                </div>
                                            </a>
                                        </td>
                                        <td>
                                            <a href="<?=base_url('product/').$items['options']['none_name']?>" style="display : inline-block">
                                                <span class="f16 b"><?=$items['name']?></span>
                                            </a>
                                        </td>
                                        <td>
                                        <span class="f16">x <?=number_format($items['qty'])?></span>
                                        </td>
                                        <td>
                                            <span class="f16"><?=number_format($items['qty']*$items['price'])?></span>
                                        </td>
                                    </td>
                                <?php } ?>
                            </table>
                        </div>
                        <div class="row" style="height : fit-content;background : #f4f4f4;padding : 10px">
                            <table class="w100">
                                <tr style="line-height : 3">
                                    <td class="f16">Tạm tính</td>
                                    <td style="text-align : right"><?=number_format($this->cart->total())?> vnd</td>
                                </tr>
                                <tr>
                                    <td style="color : green" colspan="2">Shop sẽ miễn phí vận chuyển cho các đơn hàng trị giá trên 500.000 đ </td>
                                </tr>
                                <tr style="line-height : 3">
                                    <td class="f16">Phí vận chuyển</td>
                                    <td style="text-align : right">0</td>
                                </tr>
                                <tr style="line-height : 3">
                                    <td class="f16">Tổng tiền</td>
                                    <td style="text-align : right;font-size : 24px;color : red" class="f18"><?=number_format($this->cart->total())?> vnd</td>
                                </tr>
                            </table>
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
        color: #ccc;
    }
    .label-process.third{
        background: #ccc;
        right: -2px;
    }
    .row{
        margin-bottom : 10px
    }
</style>