<?php
/**
 * Created by PhpStorm.
 * User: lihq
 * Date: 2018/11/12
 * Time: 22:57
 */
namespace core\lib;

class log
{
    /**
     * 1、确定日志存储方式
     * 2、写日志
     */

    static $class;

    /**
     * @throws \Exception
     */
    static public function init()
    {
        // 确定存储方式
        $drive = conf::get('DRIVER', 'log');
        $class = '\core\lib\drive\log\\'.$drive;
        self::$class = new $class;
    }

    static public function log($name, $file = 'log')
    {
        self::$class->log($name, $file);
    }
}