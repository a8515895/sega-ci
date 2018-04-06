<header>
    <div style="width : 70%;margin : auto">
        <ul>
            <li><a href="<?=base_url()?>"><i class="fas fa-home"></i> Home</a></li>
            <li><a href="javascript:void(0)"><i class="fas fa-phone"></i> Hotline: 1900xxxx</a></li>
            <li><a href="javascript:void(0)"><i class="fas fa-envelope-open"></i> Mail: axxxx@gmail.com</a></li>
        </ul>
        <ul class="pull-right">
            <li>
                <?php if(empty($this->session->userdata('email'))){ ?>
                    <a href="<?=base_url("verify")?>"><i class="fas fa-user-plus"></i> Đăng ký và Đăng nhập | </a>
                <?php }else{ ?>
                    <a href="<?=base_url("info/").$this->session->userdata('id')?>"><i class="fas fa-user"></i> <?=empty($this->session->userdata('name')) ? $this->session->userdata('email') : $this->session->userdata('name')?> | </a>
                <?php } ?>
            </li>
            <li><a href="javascript:void(0)"><i class="fas fa-user-md"></i> CSKH | </a></li>
            <li><a href="javascript:void(0)"><i class="fas fa-mobile-alt"></i> Liên hệ | </a></li>
            <li><a href="javascript:void(0)"><i class="fab fa-facebook-f"></i> | </a></li>
            <li style="position : relative"><a href="<?=base_url("cart")?>"><i class="fas fa-shopping-cart"></i> <span style="position : absolute;top : 1px;right : -7px" class="badge" id="cartBadge"><?=$this->cart->total_items()?></span></a></li>
        </ul>
        <div class="clear"></div>
    </div>
</header>