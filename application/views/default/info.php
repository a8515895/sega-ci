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
                                            <button id="updateTK" type="button"class="btn btn-info btn-block">Cập nhật lại thông tin</button>
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
                                            <span class="span1"><?=empty($user->name) ? "<span style='color : #ccc;font-size : 11px'><i>( đang cập nhật )</i><span>" : $user->name ?> <i style="display : none" class="fas fa-edit"></i></span>
                                            <input class="form-control" style="display : none" />
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-3 f16 b" style="color : #2d3877;">Số điện thoại</div>
                                        <div class="col-sm-9 b edit" style="cursor : pointer">
                                            <span class="span1"><?=empty($user->phone) ? "<span style='color : #ccc;font-size : 11px'><i>( đang cập nhật )</i><span>" : $user->phone ?> <i style="display : none" class="fas fa-edit"></i></span>
                                            <input class="form-control" style="display : none" />
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-3 f16 b" style="color : #2d3877;">Địa chỉ</div>
                                        <div class="col-sm-9 b edit" style="cursor : pointer">
                                            <span class="span1"><?=empty($user->address) ? "<span style='color : #ccc;font-size : 11px'><i>( đang cập nhật )</i><span>" : $user->address ?> <i style="display : none" class="fas fa-edit"></i></span>
                                            <input name="address" class="form-control" style="display : none"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-4 f16 b" style="color : #2d3877">
                                            <label>Tỉnh / Thành</label>
                                            <select id="selectProvince" class="form-control">
                                                <option value='a'>Đang cập nhật</option>
                                                <?php foreach($province as $pro){ ?>
                                                    <option value='<?=$pro['provinceid']?>'><?=$pro['name']?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="col-sm-4 f16 b" style="color : #2d3877">
                                            <label>Quận / Huyện</label>
                                            <select id="selectDistrict" class="form-control">
                                                <option>Đang cập nhật</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-4 f16 b" style="color : #2d3877">
                                            <label>Phường</label>
                                            <select id="selectWard" class="form-control">
                                                <option>Đang cập nhật</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row" style="margin-top : 20px">
                                        <div class="col-md-12">
                                            <div id="map"></div>
                                        </div>
                                        <div class="col-md-12">
                                            <button type="button" class="btn" onclick="timDuongDi()">Find</button>
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
    var map, infoWindow;
    var address = "243 tạ quang bửu";
    function initMap() {
        var uluru = {lat: '21 02 08', lng: '105 49 38'};
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 18,
          center: uluru
        });
        var marker = new google.maps.Marker({
          position: uluru,
          map: map
        });
        // geocoder = new google.maps.Geocoder();
        // map = new google.maps.Map(document.getElementById('map'), {
        //     center: {lat: -34.397, lng: 150.644},
        //     zoom: 16
        // });
        // infoWindow = new google.maps.InfoWindow;
        // Try HTML5 geolocation.
        // if (geocoder) {
        //     geocoder.geocode( { 'address': address}, function(results, status) {
        //         if (status == google.maps.GeocoderStatus.OK) {
        //         if (status != google.maps.GeocoderStatus.ZERO_RESULTS) {
        //         map.setCenter(results[0].geometry.location);

        //             var infowindow = new google.maps.InfoWindow(
        //                 { content: '<b>'+address+'</b>',
        //                 size: new google.maps.Size(150,50)
        //                 });

        //             var marker = new google.maps.Marker({
        //                 position: results[0].geometry.location,
        //                 map: map, 
        //                 title:address
        //             }); 
        //             google.maps.event.addListener(marker, 'click', function() {
        //                 infowindow.open(map,marker);
        //             });

        //         } else {
        //             alert("No results found");
        //         }
        //         } else {
        //         alert("Geocode was not successful for the following reason: " + status);
        //         }
        //     });
        // }
    }
    function timDuongDi() {
        var latlng = new google.maps.LatLng(10.802145, 106.714965); //Vị trí của cửa hàng
        var map = new google.maps.Map(document.getElementById('map'), {
            center: latlng,
            zoom: 16
        });
        var infoWindow = new google.maps.InfoWindow({ map: map });

        // Try HTML5 geolocation.
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function (position) {
                var pos = {
                    lat: position.coords.latitude,
                    lng: position.coords.longitude
                };

                infoWindow.setPosition(pos);
                infoWindow.setContent('Vị trí của bạn');
                map.setCenter(pos);

                var directionsDisplay = new google.maps.DirectionsRenderer({
                    map: map
                });
                var request = {
                    destination: latlng, // Điểm đến là vị trí cửa hàng
                    origin: pos, // Điểm bắt đầu là vị trí hiện tại của bạn
                    travelMode: google.maps.TravelMode.DRIVING
                };
                var directionsService = new google.maps.DirectionsService();
                directionsService.route(request, function (response, status) {
                    if (status == google.maps.DirectionsStatus.OK) {
                        // Display the route on the map.
                        directionsDisplay.setDirections(response);
                    }
                });
            }, function () {
                handleLocationError(true, infoWindow, map.getCenter());
            });
        } else {
            // Browser doesn't support Geolocation
            handleLocationError(false, infoWindow, map.getCenter());
        }
    }

    function handleLocationError(browserHasGeolocation, infoWindow, pos) {
        infoWindow.setPosition(pos);
        infoWindow.setContent(browserHasGeolocation ?
                                'Error: The Geolocation service failed.' :
                                'Error: Your browser doesn\'t support geolocation.');
        infoWindow.open(map);
    }
</script>
<script src="<?=base_url("public/js/scriptDefault.js")?>"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDC0N-b_kUDVahsGCry6d8fP8noZD6OgB0&callback=initMap"></script>
<script>
    $(document).ready(function(){
        $('select').select2();
        $(".edit").mouseenter(function(){
            $(this).find(".fas").css("display","inline");
        })
        $(".edit").mouseleave(function(){
            // alert("b");
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
                            toastr.error(res.err,"Update thông tin thất bại");
                        }
                        else {
                            toastr.success("Update thông tin thành công");
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