<?php
/***************************************************************************
 * Curl公共类
 * Copyright (c) 2016 github.com, Inc. All Rights Reserved
 * 
 **************************************************************************/
 
 
 
/**
 * @file helper/Curl.php
 * @author root(mingzhehao@github.com)
 * @date 2016/11/07 10:42:02
 *  
 **/
namespace common\helper;

class Curl{

    public static function doPost($url,$data, $header = array(),$isHttps = false){
        $ch = curl_init();
        curl_setopt($ch,CURLOPT_URL,$url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch,CURLOPT_POST,1);
        curl_setopt($ch,CURLOPT_POSTFIELDS,$data);
        if($isHttps)
        {
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
        }
        $output=curl_exec($ch);
        curl_close($ch);
        return $output;
    }
    public static function doGet($url){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        $output = curl_exec($ch);
        curl_close($ch);
        return $output;
    }
}





?>
