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
                    <div class="col-md-6">
                        <a href="<?=base_url()?>" class="btn btn-default f16" style="padding : 6px 12px">Tiếp tục mua hàng</a>
                    </div>
                    <div class="col-md-6">
                        <a href="<?=base_url("home/deleteCart")?>" class="btn btn-warning pull-right f16" style="padding : 6px 12px"><i class="fas fa-trash"></i> Xóa giỏ hàng</a>
                    </div>
                </div>
                <div class="row" style="margin : 20px 20px">
                    <div class="col-md-9">
                        <?php foreach ($this->cart->contents() as $items){ ?>
                            <div class="row" style="height : 190px;padding: 20px 0;margin-bottom: 20px;border-bottom: 1px solid #2a2f56;">
                                <div class="col-md-3 ">
                                    <div class="content-product-img-detail" style="height : 150px">
                                        <a href="<?=base_url('product/').$items['options']['none_name']?>">
                                            <img src="<?=base_url("public/img/product/").$items['options']['img']?>" class="img"/>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <span class="title"><?=$items['name']?></span>
                                </div>
                                <div class="col-md-3">
                                    <span class="title"><?=number_format($items['price'])?> VND x <?=number_format($items['qty'])?></span>
                                </div>
                                <div class="col-md-3" style="padding-left : 0">
                                    <span class="title" style="color : red">= <?=number_format($items['price']*$items['qty'])?> VND <a style="font-size : 14px;display : inline-block;" href="javascript:void(0)" onclick="deleteItem('<?=$items['rowid']?>')"><i style="font-size : 1em" class="fas fa-trash-alt"></i></a></span>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="col-md-3">
                        <div style="height : fit-content;background : #f4f4f4;padding : 10px">
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
                                    <td style="text-align : right;font-size : 24px;color : red"><?=number_format($this->cart->total())?> vnd</td>
                                </tr>
                                <tr style="line-height : 3;" >
                                    <td colspan="2">
                                        <a href="<?=base_url("")?>" class="btn btn-danger btn-block">TIẾP TỤC MUA HÀNG</a>
                                    </td>
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