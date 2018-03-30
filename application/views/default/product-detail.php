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
        <div style="height:500px;width :90%;margin : auto"></div>
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