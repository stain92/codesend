<?php
include_once "common.php";

/*$user_repository= new \Repository\UserRepository3($db);
$user_services= new \Services\UserServices3($user_repository);
$user=new \Http\UserHttp3($data_binder,$template,$user_services);*/
$user->login($_POST);