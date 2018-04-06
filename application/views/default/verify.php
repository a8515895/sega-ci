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
            <?php $this->load->view('default/titlePage',['title'=>'Đăng nhập và Đăng ký']); ?>
            <div class="p10">
                <div class="row">
                    <div class="col-md-4">
                        <div style="height : max-content;border: 1px solid #efeeef;border-radius : 4px">
                            <div class="row w100 p10" style="background : #efeeef;color : #2d3877"><b>Đăng nhập</b></div>
                            <div class="p10">
                                <form id="login" method="post">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input required type="email" class="form-control" name="email">
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input required type="password" class="form-control" name="password">
                                    </div>
                                    <div class="form-group">
                                        <a href="javascript:void(0)" class="btn btn-link">Quên mật khẩu ?</a>
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-info" id="loginBtn">Đăng Nhập</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4"></div>
                    <div class="col-md-4">
                        <div style="height : max-content;border: 1px solid #efeeef;border-radius : 4px">
                            <div class="row w100 p10" style="background : #efeeef;color : #2d3877"><b>Đăng ký</b></div>
                            <div class="p10">
                                <form id="register" method="post">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input required type="email" class="form-control" name="email">
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input required type="password" class="form-control" name="password">
                                    </div>
                                    <div class="form-group">
                                        <label>Re-Password</label>
                                        <input required type="password" class="form-control" name="repassword">
                                    </div>
                                    <div class="form-group">
                                        <button id="registerBtn" class="btn btn-info">Đăng ký</button>
                                    </div>
                                </form>
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
        $("#loginBtn").click(function(e){
            e.preventDefault();
            var form = $('form#login');
            var formData = new FormData(form[0]);
            $.ajax({
                type: 'post',
                url: url+'login',
                data: formData,
                contentType: false, 
                processData: false,
                success: function (kq) {
                    if(kq == 0) toastr.error("Đăng nhập thất bại");
                    else {
                        toastr.success("Đăng nhập thành công");
                        window.location.href = url;
                    }
                }
            });
        });
        $("#registerBtn").click(function(e){
            e.preventDefault();
            var form = $('form#register');
            var formData = new FormData(form[0]);
            $.ajax({
                type: 'post',
                url: url+'register',
                data: formData,
                contentType: false, 
                processData: false,
                success: function (kq) {                    
                    if(kq == 0) window.location.href = url;
                    else{
                        res=$.parseJSON(kq);
                        toastr.error(res.err,"Đăng ký thất bại");
                    }
                }
            });
        });
    })
</script>