<?php
session_start();
spl_autoload_register();
$config = parse_ini_file('Config/db.ini');

$pdo = new PDO($config['dsn'],$config['user'],$config['password'],[PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION, PDO::ATTR_CASE=>PDO::CASE_LOWER]);
$db = new \Database\PDODatabase($pdo);
$template = new \Core\Template3();
$data_binder = new \Core\DataBinding3();

$items_repository= new \Repository\ItemsRepository3($db);
$items_services=new \Services\ItemsServices3($items_repository);
$category_repository = new \Repository\CategoriesRepository3($db);
$category_services= new \Services\CategoriesServices3($category_repository);
$user_repository=new \Repository\UserRepository3($db);
$user_service=new \Services\UserServices3($user_repository);
$user=new \Http\UserHttp3($data_binder,$template,$user_service);
$item=new \Http\ItemsHttp3($template,$user_service,$category_services,$data_binder,$items_services);