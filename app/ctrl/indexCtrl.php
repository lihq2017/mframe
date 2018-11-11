<?php
/**
 * Created by PhpStorm.
 * User: lihq
 * Date: 2018/11/11
 * Time: 9:39
 */

namespace app\ctrl;

use core\lib\model;

class indexCtrl
{
    public function index()
    {
        p('index ctrl');
        $model = new model();
        $sql = "SELECT * FROM c";
        $ret = $model->query($sql);
        p($ret->fetchAll());
    }
}