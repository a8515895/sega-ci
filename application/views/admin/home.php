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
        <link href="<?=base_url("public/plugin/confirm/jquery-confirm.min.css")?>" rel="stylesheet">
        <link href="<?=base_url("public/css/styleAdmin.css")?>" rel="stylesheet">
        <link href="<?=base_url("public/css/reset.css")?>" rel="stylesheet">
        <link href="<?=base_url("public/css/styleAdmin.css")?>" rel="stylesheet">        
        <title>Sega Tea</title>
    </head>
    <body style="overflow : hidden">
        <div class="kh-header"></div>
        <div class="kh-container">
            <div class="left">
                <ul>
                    <li >
                        <a class='href activeHref' data-href="dashboard" href="javascript:void(0)" onclick="loadHref(this)"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
                    </li>
                    <li >
                        <a class='href' data-href="category" href="javascript:void(0)" onclick="loadHref(this)"><i class="fas fa-book"></i> Danh mục</a>
                    </li>
                    <li >
                        <a class='href' data-href="product" href="javascript:void(0)" onclick="loadHref(this)"><i class="fas fa-coffee"></i> Sản phẩm</a>
                    </li>
                    <li >
                        <a class='href' data-href="bill" href="javascript:void(0)" onclick="loadHref(this)"><i class="fas fa-money-bill-alt"></i> Đơn hàng</a>
                    </li>
                    <li >
                        <a class='href' data-href="user" href="javascript:void(0)" onclick="loadHref(this)"><i class="fas fa-user-plus"></i> Nhân viên</a>
                    </li>
                </ul>
            </div>
            <div class="right">
                <div id="load">
                    <i class="fas fa-spinner fa-pulse fa-6x"></i>
                </div>
                <div class="wrapper">

                </div>
            </div>
        </div>
    </body>
    <script src="<?=base_url("public/js/jquery-3.3.1.min.js")?>"></script>
    <script src="<?=base_url("public/js/bootstrap.min.js")?>"></script>
    <script src="<?=base_url("public/plugin/toast/toast.min.js")?>"></script>
    <script src="<?=base_url("public/plugin/dataTable/dataTable.min.js")?>"></script>
    <script src="<?=base_url("public/plugin/select2/select2.min.js")?>"></script>
    <script src="<?=base_url("public/plugin/confirm/jquery-confirm.min.js")?>"></script>
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