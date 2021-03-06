<?php

namespace core;

use core\lib\log;

class imooc
{
	public static $classMap = [];

	public $assign = [];

    /**
     * @throws \Exception
     */
	public static function run()
	{
	    log::init();
		$route = new \core\lib\route();
		$ctrlClass = $route->ctrl;
		$action = $route->action;

		$ctrlFile = APP.'/ctrl/'.$ctrlClass.'Ctrl.php';
		$ctrlClass = '\\'.MODULE.'\\ctrl\\'.$ctrlClass.'Ctrl';
		if (is_file($ctrlFile)){
		    require_once $ctrlFile;
		    $ctrl = new $ctrlClass();
		    $ctrl->$action();
		    log::log('ctrl:'.$ctrlClass.'  '.'action:'.$action);
        } else {
            throw new \Exception('找不到控制器'.$ctrlClass);
        }
	}

	public static function load($class)
	{
		// 自动加载类库
		if (isset($classMap[$class])) {
			return true;
		}
		$class = str_replace('\\', '/', $class);
		$file = IMOOC.'/'.$class.'.php';
		if ($file) {
			require_once $file;
			self::$classMap[$class] = $class;
		} else {
			return false;
		}
	}

	public function assign($name, $value)
    {
        $this->assign[$name] = $value;
    }

    public function display($file)
    {
        $file_path = APP.'/views/'.$file;
        if (is_file($file_path)){
            $loader = new \Twig_Loader_Filesystem(APP.'/views');
            $twig = new \Twig_Environment($loader, [
                'cache' => IMOOC.'/log/twig',
                'debug' => DEBUG
            ]);
            $template = $twig->loadTemplate($file);
            $template->display($this->assign ?? []);
        }
    }
}