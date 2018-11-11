<?php

namespace core;

class imooc
{
	public static $classMap = [];

	public $assign = [];

    /**
     * @throws \Exception
     */
	public static function run()
	{
		$route = new \core\lib\route();
		$ctrlClass = $route->ctrl;
		$action = $route->action;

		$ctrlFile = APP.'/ctrl/'.$ctrlClass.'Ctrl.php';
		$ctrlClass = '\\'.MODULE.'\\ctrl\\'.$ctrlClass.'Ctrl';
		if (is_file($ctrlFile)){
		    require_once $ctrlFile;
		    $ctrl = new $ctrlClass();
		    $ctrl->$action();
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
        $file = APP.'/views/'.$file;
        if (is_file($file)){
            extract($this->assign);
            include $file;
        }
    }
}