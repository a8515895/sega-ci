<?php if($this->cart->total_items()==0){ ?>
    <div style="margin : 50px auto;width : fit-content;">
        <i style="color : #c4c4c4" class="fas fa-cart-arrow-down fa-6x"></i>
        <div style="color : #c4c4c4">GIỎ HÀNG TRỐNG</div>
    </div>
<?php }else{ ?>
    <?php foreach($this->cart->contents() as $it){ ?>
        <div class="row" style="margin-top : 20px;border-bottom : 1px solid #2a2f56;padding-bottom : 10px">
            <div class="col-md-5 " style="padding : 0">
                <div class="content-product-img-detail" style="height : 110px;overflow : hidden">
                    <a href="<?=base_url('public/img/product/').$it['options']['none_name']?>"><img class="img" src="<?=base_url('public/img/product/').$it['options']['img']?>" /></a>
                </div>
            </div>
            <div class="col-md-7" style="padding : 0;text-align : right">
                <div class="row">
                    <div class="col-md-12 f16 b"><?=$it['name']?></div>
                </div>
                <div class="row">
                    <div class="col-md-8"><?=number_format($it['price'])?> đ</div>
                    <div class="col-md-4" style="padding-left:0">x <?=$it['qty']?></div>
                </div>
                <div class="row">
                    <div class="col-md-12 b" style="color : #2a2f56"><?=number_format($it['price']*$it['qty'])?> đ</div>
                </div>
            </div>
        </div>
    <?php } ?>
    <div class="row" style="margin : 20px 0 10px 0">
        <div class="col-md-3 f16 b" style="padding-right : 0">Tổng tiền</div>
        <div class="col-md-9 f18" style="text-align : right;color : red"><?=number_format($this->cart->total())?> VND</div>
    </div>
    <div class="row" style="margin : 10px 0;text-align : right">
        <div class="col-md-12 f16 b" style="padding-right : 0"><a href="<?=base_url("cart")?>" class="btn btn-link">Xem chi tiết giỏ hàng</a></div>
    </div>
<?php } ?>
