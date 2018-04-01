<header>
    <div style="width : 70%;margin : auto">
        <ul>
            <li><a href="<?=base_url()?>"><i class="fas fa-home"></i> Home</a></li>
            <li><a href="javascript:void(0)"><i class="fas fa-phone"></i> Hotline: 1900xxxx</a></li>
            <li><a href="javascript:void(0)"><i class="fas fa-envelope-open"></i> Mail: axxxx@gmail.com</a></li>
        </ul>
        <ul class="pull-right">
            <li><a href="javascript:void(0)"><i class="fas fa-user-plus"></i> Đăng ký | </a></li>
            <li><a href="javascript:void(0)"><i class="fas fa-user-md"></i> CSKH | </a></li>
            <li><a href="javascript:void(0)"><i class="fas fa-mobile-alt"></i> Liên hệ | </a></li>
            <li><a href="javascript:void(0)"><i class="fab fa-facebook-f"></i> | </a></li>
            <li style="position : relative"><a href="<?=base_url("cart")?>"><i class="fas fa-shopping-cart"></i> <span style="position : absolute;top : 1px;right : -7px" class="badge" id="cartBadge"><?=$this->cart->total_items()?></span></a></li>
        </ul>
        <div class="clear"></div>
    </div>
</header>