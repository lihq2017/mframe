<?php
/**
 * 入口文件
 * 1、定义常量
 * 2、加载函数库
 * 3、启动框架
 */

define('IMOOC', realpath('./'));
define('CORE', IMOOC.'/core');
define('APP', IMOOC.'/app');
define('MODULE', 'app');

define('DEBUG', true);

include "vendor/autoload.php";

if (DEBUG) {
    $whoops = new Whoops\Run();
    $errorTitle = '框架出错了';
    $option = new \Whoops\Handler\PrettyPageHandler();
    $option->setPageTitle($errorTitle);
    $whoops->pushHandler($option);
    $whoops->register();
	ini_set('display_errors', 'On');
	error_reporting(E_ALL | E_STRICT);
} else {
	ini_set('display_errors', 'Off');
}

require_once CORE.'/common/function.php';

require_once CORE.'/imooc.php';

spl_autoload_register('\core\imooc::load');

\core\imooc::run();