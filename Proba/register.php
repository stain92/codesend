<?php
include_once 'common.php';
/*$user_repository = new \Repository\UserRepository3($db);
$user_service= new \Services\UserServices3($user_repository);
$user=new \Http\UserHttp3($data_binder,$template,$user_service);*/
$user->register($_POST);