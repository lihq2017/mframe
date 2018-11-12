<?php
/**
 * Created by PhpStorm.
 * User: lihq
 * Date: 2018/11/12
 * Time: 22:58
 */
namespace core\lib\drive\log;
// 文件系统

use core\lib\conf;

class file
{
    public $path; // 日志存储位置

    /**
     * file constructor.
     * @throws \Exception
     */
    public function __construct()
    {
        $conf = conf::get('OPTION', 'log');
        $this->path = $conf['PATH'];
    }

    public function log($message, $file = 'log')
    {
        /**
         * 1、确定文件存储位置是否存在
         *    新建目录
         * 3、写入日志
         */
        $file_path = $this->path . date('YmdH').'/';
        if (! is_dir($file_path)){
            mkdir($file_path, 777, true);
        }
        $message = '【'.date('Y-m-d H:i:s').'】'.json_encode($message, 256);
        $path = $file_path.'/'.$file.'.php';
        return file_put_contents($path, $message.PHP_EOL, FILE_APPEND);
    }
}