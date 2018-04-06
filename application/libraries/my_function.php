<?php 
    class My_function{
        function xoaDau($str){
            if(!$str) return false;
            $str = trim($str);
            $unicode = array(
                'a' => 'á|à|ả|ã|ạ|ă|ắ|ằ|ặ|ẳ|ẵ|â|ấ|ầ|ẩ|ẫ|ậ|A|Á|À|Ả|Ã|Ạ|Ă|Ắ|Ằ|Ẳ|Ẵ|Ặ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',
                'd' => 'đ|Đ',
                'e' => 'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ|E|É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',
                'i' => 'í|ì|ỉ|ĩ|ị|I|Í|Ì|Ỉ|Ĩ|Ị',
                'o' => 'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ|O|Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',
                'u' => 'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự|U|Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',
                'y' => 'ý|ỳ|ỷ|ỹ|ỵ|Y|Ý|Ỳ|Ỷ|Ỹ|Ỵ',        
            );
            foreach ($unicode as $nonUnicode => $uni)
                $str = preg_replace("/($uni)/i",$nonUnicode,$str);
            $str = strtolower(str_replace(' ','-',$str));           // Replaces all spaces with hyphens.
            $str = preg_replace('/[^A-Za-z0-9\-]/', '', $str);      // Removes special chars.
            $str = preg_replace('/-+/', '-', $str);               // Replaces multiple hyphens with single one.	
            return $str;
        }
        function ajaxAlert(){

        }
        function DECtoDMS($dec)
        {        
            $lat=trim(explode(",",$dec)[0]);
            $latD = substr($lat,-1);
            $degreesLat = explode(" ",$lat)[0];
            $minutesLat = explode(" ",$lat)[1];
            $secondsLat = rtrim(explode(" ",$lat)[2],substr(explode(" ",$lat)[2],-1));
            if($latD == "N" || $latD == "E"){
                $decimalLat = $degreesLat + ($minutesLat / 60) + ($secondsLat / 3600);
            }else{
                $decimalLat = ($degreesLat + ($minutesLat / 60) + ($secondsLat / 3600)) * -1;
            }
            $lng = trim(explode(",",$dec)[1]);
            $lngD = substr($lng,-1);
            $degreesLng = explode(" ",$lng)[0];
            $minutesLng = explode(" ",$lng)[1];
            $secondsLng = rtrim(explode(" ",$lng)[2],substr(explode(" ",$lng)[2],-1));;
            if($lngD == "N" || $lngD == "E"){
                $decimalLng = $degreesLng + ($minutesLng / 60) + ($secondsLng / 3600);
            }else{
                $decimalLng = ($degreesLng + ($minutesLng / 60) + ($secondsLng / 3600)) * -1;
            }
            return array('lat'=>round($decimalLat,6),'lng'=>round($decimalLng,6));
        } 
    }