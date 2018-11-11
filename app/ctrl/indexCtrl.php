<?php
/**
 * Created by PhpStorm.
 * User: lihq
 * Date: 2018/11/11
 * Time: 9:39
 */

namespace app\ctrl;

use core\imooc;
use core\lib\model;

class indexCtrl extends imooc
{
    public function index()
    {
        $data = 'Hello World';
        $title = '视图文件';
        $this->assign('title', $title);
        $this->assign('data', $data);
        $this->display('index.html');
//        p('index ctrl');
//        $model = new model();
//        $sql = "SELECT * FROM c";
//        $ret = $model->query($sql);
//        p($ret->fetchAll());
    }
}