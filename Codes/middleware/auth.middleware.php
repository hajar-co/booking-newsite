<?php
session_start();
$key = "token";
$sessionToken = isset($_SESSION[$key])?$_SESSION[$key]:null;
$cookieToken = isset($_COOKIE[$key])?$_COOKIE[$key]:null;
$token = null;
$userId = null;
if($sessionToken!= null || $cookieToken != null){
    $token = ($sessionToken != null) ? $sessionToken : $cookieToken;
}else{
    header("location: ./login");
}
try {
    $data = (object) fetchToken($token);
    if(getUserMac() != $data->mac){
        header("location: ./login");
    }
    $userId = $data->id;
} catch (Exception $e){
    echo $e->getMessage();
    die;
}