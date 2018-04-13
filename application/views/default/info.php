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
            <?php $this->load->view('default/titlePage',['title'=>'Thông tin cá nhân']); ?>
            <div class="container p10">
                <div class="row">
                    <div class="col-md-6">
                        <form id="form1">
                            <div class="row" style="border-bottom : 1px solid #2d3877;margin-bottom : 10px">
                                <h3>Thông tin tài khoản</h3>
                            </div>
                            <div class="row">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-3 f16 b" style="color : #2d3877;">Email</div>
                                        <div class="col-sm-9 b edit" style="cursor : pointer">
                                            <span class="span1"><?=$user->email?> <i style="display : none" class="fas fa-edit"></i></span>
                                            <input  class="form-control updateTK" name="email" style="display : none" value="<?=$user->email?>"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-3 f16 b" style="color : #2d3877">Password</div>
                                        <div class="col-sm-9 b"><input type="password" name="password" class="form-control"></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-3 f16 b" style="color : #2d3877">Re-Password</div>
                                        <div class="col-sm-9 b"><input type="password" name="repassword" class="form-control"></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-12 b">
                                            <button id="updateTK" type="button"class="btn btn-info btn-block">Cập nhật tài khoản</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-6">
                        <form id="form2">
                            <div class="row" style="border-bottom : 1px solid #2d3877;margin-bottom : 10px">
                                <h3>Thông tin cá nhân</h3>
                            </div>
                            <div class="row">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-3 f16 b" style="color : #2d3877;">Họ và tên</div>
                                        <div class="col-sm-9 b edit" style="cursor : pointer">
                                            <span class="span1"><?=empty($user->name) ? "<span style='color : #ccc;font-size : 11px'><i>( đang cập nhật )</i></span>" : $user->name ?> <i style="display : none" class="fas fa-edit"></i></span>
                                            <input name="name" class="form-control updateInfo" style="display : none" value="<?=$user->name?>" />
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-3 f16 b" style="color : #2d3877;">Số điện thoại</div>
                                        <div class="col-sm-9 b edit" style="cursor : pointer">
                                            <span class="span1"><?=empty($user->phone) ? "<span style='color : #ccc;font-size : 11px'><i>( đang cập nhật )</i></span>" : $user->phone ?> <i style="display : none" class="fas fa-edit"></i></span>
                                            <input name="phone" class="form-control updateInfo" style="display : none" value="<?=$user->phone?>" />
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-3 f16 b" style="color : #2d3877;">Địa chỉ</div>
                                        <div class="col-sm-9 b edit" style="cursor : pointer">
                                            <span class="span1"><?=empty($user->address) ? "<span style='color : #ccc;font-size : 11px'><i>( đang cập nhật )</i></span>" : $user->address ?> <i style="display : none" class="fas fa-edit"></i></span>
                                            <input name="address" class="form-control updateInfo" style="display : none" value="<?=$user->address?>"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-4 f16 b" style="color : #2d3877">
                                            <label>Tỉnh / Thành</label>
                                            <select id="selectProvince" name="province" class="form-control" style="width : 100%">
                                                <option value=''>Đang cập nhật</option>
                                                <?php foreach($province as $pro){ ?>
                                                    <?php if($user->province == $pro['provinceid']){ ?>
                                                        <option value='<?=$pro['provinceid']?>' selected><?=$pro['name']?></option>
                                                    <?php }else{ ?>
                                                        <option value='<?=$pro['provinceid']?>'><?=$pro['name']?></option>
                                                    <?php } ?>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="col-sm-4 f16 b" style="color : #2d3877">
                                            <label>Quận / Huyện</label>
                                            <select id="selectDistrict" name="district" class="form-control" style="width : 100%">
                                                <option value=''>Đang cập nhật</option>
                                                <?php if(!empty($district)){ ?>
                                                    <?php foreach($district as $dis){ ?>
                                                        <?php if($user->district == $dis['districtid']){ ?>
                                                            <option value='<?=$dis['districtid']?>' selected><?=$dis['name']?></option>
                                                        <?php }else{ ?>
                                                            <option value='<?=$dis['districtid']?>'><?=$dis['name']?></option>
                                                        <?php } ?>
                                                    <?php } ?>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="col-sm-4 f16 b" style="color : #2d3877">
                                            <label>Phường</label>
                                            <select id="selectWard" name="ward" class="form-control" style="width : 100%">
                                                <option value=''>Đang cập nhật</option>
                                                <?php if(!empty($ward)){ ?>
                                                    <?php foreach($ward as $wa){ ?>
                                                        <?php if($user->ward == $wa['wardid']){ ?>
                                                            <option value='<?=$wa['wardid']?>' selected><?=$wa['name']?></option>
                                                        <?php }else{ ?>
                                                            <option value='<?=$wa['wardid']?>'><?=$wa['name']?></option>
                                                        <?php } ?>
                                                    <?php } ?>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row" style="margin-top : 20px">
                                        <div class="col-md-12">
                                            <button type="button" class="btn btn-warning btn-block" id="updateInfo">Cập nhật thông tin người dùng</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
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
        $('select').select2();
        $(".edit").mouseenter(function(){
            $(this).find(".fas").css("display","inline");
        })
        $(".edit").mouseleave(function(){
            $(this).find(".fas").css("display","none");
            $(this).find("span.span1").css("display","block");
            $(this).children("input").css("display","none");
        })
        $(".edit").click(function(){
            $(this).children("input").css("display","block");
            $(this).find("span.span1").css("display","none");
        })
        $("#updateTK").click(function(){
            var form = $('form#form1');
            var formData = new FormData(form[0]);
            $.ajax({
                type: 'post',
                url: url+'updateTK',
                data: formData,
                contentType: false, 
                processData: false,
                success: function (kq) {
                    if(kq != 0) {
                        res = $.parseJSON(kq);
                        toastr.error(res.err,"Update thông tin thất bại");
                    }
                    else {
                        toastr.success("Update thông tin thành công");
                    }
                }
            });
        })        
        $('input.updateTK').keypress(function (e) {
            if (e.which == 13) {
                var form = $('form#form1');
                var formData = new FormData(form[0]);
                $.ajax({
                    type: 'post',
                    url: url+'updateTK',
                    data: formData,
                    contentType: false, 
                    processData: false,
                    success: function (kq) {
                        if(kq != 0) {
                            res = $.parseJSON(kq);
                            toastr.error(res.err,"Update tài khoản thất bại");
                        }
                        else {
                            toastr.success("Update tài khoản thành công");
                        }
                    }
                });            
            }
        });
        $("#updateInfo").click(function(){
            var form = $('form#form2');
            var formData = new FormData(form[0]);
            $.ajax({
                type: 'post',
                url: url+'updateInfo',
                data: formData,
                contentType: false, 
                processData: false,
                success: function (kq) {
                    if(kq != 0) {
                        res = $.parseJSON(kq);
                        toastr.error(res.err,"Update thông tin thất bại");
                    }
                    else {
                        location.reload();           
                    }
                }
            });
        })
        $('input.updateInfo').keypress(function (e) {
            if (e.which == 13) {
                var form = $('form#form2');
                var formData = new FormData(form[0]);
                $.ajax({
                    type: 'post',
                    url: url+'updateInfo',
                    data: formData,
                    contentType: false, 
                    processData: false,
                    success: function (kq) {
                        if(kq != 0) {
                            res = $.parseJSON(kq);
                            toastr.error(res.err,"Update thông tin thất bại");
                        }
                        else {
                            location.reload();           
                        }
                    }
                });            
            }
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
    })

    // initMap();
</script>