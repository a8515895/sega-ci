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
                                <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
                                </div>
                            </div>
                            <span class="label-process first">1</span>
                            <span class="label-title first"><a href="javascript:void(0)">Địa chỉ giao hàng</a></span>
                            <span class="label-process second">2</span>
                            <span class="label-title second"><a href="javascript:void(0)">Xác nhận đơn hàng</a></span>
                            <span class="label-process third">3</span>
                            <span class="label-title third"><a href="javascript:void(0)">Hoàn tất</a></span>
                        </div>
                        <div class="row" style="margin-top : 60px;margin-bottom : 0">
                            <div class="col-md-6 f18 tab-href activeTab" style="">
                                <a href="javascript:void(0)" data-tab="login" role="tab" data-toggle="tab">Nhập thông tin </a>
                            </div>
                            <div class="col-md-6 f18 tab-href" style="border-left : 0">
                                <a href="javascript:void(0)" data-tab="form" role="tab" data-toggle="tab">Thông tin đăng ký</a>
                            </div>
                        </div>
                        <div class="row" style="margin-top : -1px;border: 1px solid #e4e4e4;border-top : 0;padding : 10px">
                            <div class="tab-pane activeTab" id="tab-login">
                                <div class="col-md-12 f18" style="text-align : center;margin-bottom : 10px">Thông tin giao hàng</div>
                                <form id="form" method="post">
                                    <div class="row">
                                        <div class="col-sm-4" style="font-weight : bold;text-align : right;line-height : 2">Họ và tên <font color='red'>*</font></div>
                                        <div class="col-sm-8">
                                            <input name='name' class="form-control" />
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4" style="font-weight : bold;text-align : right;line-height : 2">Điện thoại di động <font color='red'>*</font></div>
                                        <div class="col-sm-8">
                                            <input name='phone' class="form-control" />
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4" style="font-weight : bold;text-align : right;line-height : 2">Tỉnh / thành phố <font color='red'>*</font></div>
                                        <div class="col-sm-8">
                                            <select class="form-control" id="selectProvince" name="province">
                                                <option value=''>Đang cập nhật</option>
                                                <?php foreach($province as $pro){ ?>
                                                    <option value="<?=$pro['provinceid']?>"><?=$pro['name']?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4" style="font-weight : bold;text-align : right;line-height : 2">Quận / huyện <font color='red'>*</font></div>
                                        <div class="col-sm-8">
                                            <select class="form-control" id="selectDistrict" name="district">
                                                <option value=''>Đang cập nhật</option>
                                            </select>                                    
                                        </div>
                                    </div>
                                    <div class="row">
                                    <div class="col-sm-4" style="font-weight : bold;text-align : right;line-height : 2">Phường / xã <font color='red'>*</font></div>
                                        <div class="col-sm-8">
                                            <select class="form-control" id="selectWard" name="ward">
                                                <option value=''>Đang cập nhật</option>
                                            </select>                                    
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4" style="font-weight : bold;text-align : right;line-height : 2">Địa chỉ <font color='red'>*</font></div>
                                        <div class="col-sm-8">
                                            <input name='address' class="form-control" />
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4" style="font-weight : bold;text-align : right;line-height : 2">Email </div>
                                        <div class="col-sm-8">
                                            <input type="email" name='email' class="form-control" />
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4" style="font-weight : bold;text-align : right;line-height : 2">Ghi chú</div>
                                        <div class="col-sm-8">
                                            <textarea name='note' class="form-control" row='10' name="note"></textarea>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4" style="font-weight : bold;text-align : right;line-height : 2"></div>
                                        <div class="col-sm-8">
                                            <a href="javascript:void(0)" class="btn btn-danger" onclick="clickForm('form','confirm_checkout',{url : '<?=base_url('checkout/payment')?>'})">Xác nhận đơn hàng</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane" id="tab-form">
                                <?php if(empty($this->session->userdata("email"))){ ?>
                                    <div style="width : fit-content;margin : 30px auto;">
                                        <h3>Bạn cần đăng nhập để lấy thông tin</h3>
                                        <form id="loginForm" method="post">
                                            <div class="row">
                                                <div class="col-sm-4" style="font-weight : bold;text-align : right;line-height : 2">Email</div>
                                                <div class="col-sm-8">
                                                    <input type="email" name='email' class="form-control" />
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-4" style="font-weight : bold;text-align : right;line-height : 2">Password</div>
                                                <div class="col-sm-8">
                                                    <input type="password" name='password' class="form-control" />
                                                </div>
                                            </div>
                                        </form>
                                        <p style="text-align : center">
                                            <button type="button" class="btn btn-info" onclick="clickForm('loginForm','login',{url : '<?=base_url("checkout")?>',title : 'Đăng nhập thất bại'})">Đăng nhập</button>
                                            hoặc
                                            <a href="<?=base_url("verify")?>" class="btn btn-warning">Đăng ký</a>
                                        </p>
                                    </div>
                                <?php }else{ ?>
                                    <div class="col-md-12 f18" style="text-align : center;margin-bottom : 10px">Thông tin giao hàng</div>
                                    <form id="form2" method="post">
                                        <div class="row">
                                            <div class="col-sm-4" style="font-weight : bold;text-align : right;line-height : 2">Họ và tên <font color='red'>*</font></div>
                                            <div class="col-sm-8">
                                                <input name='name' class="form-control" value="<?=$profile->name?>"/>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-4" style="font-weight : bold;text-align : right;line-height : 2">Điện thoại di động <font color='red'>*</font></div>
                                            <div class="col-sm-8">
                                                <input name='phone' class="form-control" value="<?=$profile->phone?>"/>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-4" style="font-weight : bold;text-align : right;line-height : 2">Tỉnh / thành phố <font color='red'>*</font></div>
                                            <div class="col-sm-8">
                                                <select class="form-control" id="selectProvince2" name="province">
                                                    <option value=''>Đang cập nhật</option>
                                                    <?php foreach($province as $pro){ ?>
                                                        <?php if($profile->province == $pro['provinceid']){ ?>
                                                            <option value="<?=$pro['provinceid']?>" selected><?=$pro['name']?></option>
                                                        <?php }else{ ?>
                                                            <option value="<?=$pro['provinceid']?>"><?=$pro['name']?></option>
                                                        <?php } ?>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-4" style="font-weight : bold;text-align : right;line-height : 2">Quận / huyện <font color='red'>*</font></div>
                                            <div class="col-sm-8">
                                                <select class="form-control" id="selectDistrict2" name="district">
                                                    <option value=''>Đang cập nhật</option>
                                                    <?php if(!empty($district)){ ?>
                                                        <?php foreach($district as $dis){ ?>
                                                            <?php if($profile->district == $dis['districtid']){ ?>
                                                                <option value='<?=$dis['districtid']?>' selected><?=$dis['name']?></option>
                                                            <?php }else{ ?>
                                                                <option value='<?=$dis['districtid']?>'><?=$dis['name']?></option>
                                                            <?php } ?>                                                        <?php } ?>
                                                    <?php } ?>
                                                </select>                                    
                                            </div>
                                        </div>
                                        <div class="row">
                                        <div class="col-sm-4" style="font-weight : bold;text-align : right;line-height : 2">Phường / xã <font color='red'>*</font></div>
                                            <div class="col-sm-8">
                                                <select class="form-control" id="selectWard2" name="ward">
                                                    <option value=''>Đang cập nhật</option>
                                                    <?php if(!empty($ward)){ ?>
                                                        <?php foreach($ward as $wa){ ?>
                                                            <?php if($profile->ward == $wa['wardid']){ ?>
                                                                <option value='<?=$wa['wardid']?>' selected><?=$wa['name']?></option>
                                                            <?php }else{ ?>
                                                                <option value='<?=$wa['wardid']?>'><?=$wa['name']?></option>
                                                            <?php } ?>
                                                        <?php } ?>
                                                    <?php } ?>
                                                </select>                                    
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-4" style="font-weight : bold;text-align : right;line-height : 2">Địa chỉ <font color='red'>*</font></div>
                                            <div class="col-sm-8">
                                                <input name='address' class="form-control" value="<?=$profile->address?>" />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-4" style="font-weight : bold;text-align : right;line-height : 2">Email </div>
                                            <div class="col-sm-8">
                                                <input name='email' class="form-control" value="<?=$profile->email?>"/>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-4" style="font-weight : bold;text-align : right;line-height : 2">Ghi chú</div>
                                            <div class="col-sm-8">
                                                <textarea name='note' class="form-control" row='10' name="note"></textarea>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-4" style="font-weight : bold;text-align : right;line-height : 2"></div>
                                            <div class="col-sm-8">
                                                <a href="javascript:void(0)" class="btn btn-danger" onclick="clickForm('form2','confirm_checkout',{url : '<?=base_url('checkout/payment')?>'})">Xác nhận đơn hàng</a>
                                            </div>
                                        </div>
                                    </form>
                                <?php } ?>
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
        $('select').select2({
            width : '100%'
        });
        $('#selectProvince').change(function(){
            $.get(url+"changeSelectProvince",{id : $('#selectProvince').val()},function(kq){
                $("#selectDistrict").html(kq);
            });
        });
        $('#selectDistrict').change(function(){
            $.get(url+"changeSelectDistrict",{id : $('#selectDistrict').val()},function(kq){
                $("#selectWard").html(kq);
            });
        })
        $('#selectProvince2').change(function(){
            $.get(url+"changeSelectProvince",{id : $('#selectProvince2').val()},function(kq){
                $("#selectDistrict2").html(kq);
            });
        });
        $('#selectDistrict2').change(function(){
            $.get(url+"changeSelectDistrict",{id : $('#selectDistrict2').val()},function(kq){
                $("#selectWard2").html(kq);
            });
        })
        $(".tab-href").on("click",function(){
            var id = $(this).children("a").data('tab');
            $(".tab-pane").removeClass('activeTab');
            $(".tab-href").removeClass('activeTab');
            $(this).addClass('activeTab');
            $("#tab-"+id).addClass('activeTab');
        })
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
        color: #ccc;
    }
    .label-process.second{
        background: #ccc;
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
        right: -1px;
    }
    .row{
        margin-bottom : 10px
    }
    .tab-pane{
        display : none;
    }
    .tab-pane.activeTab{
        display : block !important;
    }
    .tab-href{
        text-align : center;
        font-weight : bold;
        border : 1px solid #e4e4e4;
        padding : 0;
        border-bottom : 1px solid #e4e4e4;
        line-height : 3;
        cursor : pointer;
    }
    .tab-href.activeTab{
        background : #fff;
        border-bottom : 0;
        border-top : 3px solid #2d3877;
    }
    .tab-href>a{
        color : #333;
    }
</style>