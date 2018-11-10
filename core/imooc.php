<?php

namespace core;

class imooc
{
	public static $classMap = [];

	public static function run()
	{
		$route = new \core\lib\route();
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
}