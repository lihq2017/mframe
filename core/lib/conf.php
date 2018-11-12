<?php
/**
 * Created by PhpStorm.
 * User: lihq
 * Date: 2018/11/12
 * Time: 22:31
 */
namespace core\lib;

class conf
{
    static public $conf = [];

    /**
     * @param $name
     * @param $file
     * @return mixed
     * @throws \Exception
     */
    static public function get($name, $config)
    {
        /**
         * 1、判断配置文件是否存在
         * 2、判断配置是否存在
         * 3、缓存配置
         */
        if (isset(self::$conf[$config])){
            return self::$conf[$config][$name];
        }
        $file = IMOOC.'/core/config/'.$config.'.php';
        if (is_file($file)){
            $conf = include $file;
            if (isset($conf[$name])){
                self::$conf[$config] = $conf;
                return $conf[$name];
            } else {
                throw new \Exception('没有这个配置项'.$name);
            }
        } else {
            throw new \Exception('找不到配置文件'.$file);
        }
    }

    /**
     * @param $config
     * @return mixed
     * @throws \Exception
     */
    static public function all($config)
    {
        if (isset(self::$conf[$config])){
            return self::$conf[$config];
        }
        $file = IMOOC.'/core/config/'.$config.'.php';
        if (is_file($file)){
            $conf = include $file;
            self::$conf[$config] = $conf;
            return $conf;
        } else {
            throw new \Exception('找不到配置文件'.$file);
        }
    }
}