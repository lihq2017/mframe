<?php
/**
 * Created by PhpStorm.
 * User: lihq
 * Date: 2018/11/11
 * Time: 9:39
 */

namespace app\ctrl;

use app\model\cModel;
use core\imooc;
use core\lib\conf;
use core\lib\model;

class indexCtrl extends imooc
{
    /**
     * @throws \Exception
     */
    public function index()
    {
        $model = new cModel();
//        $ret = $model->lists();
//        dump($ret);
//        $ret = $model->getOne(4);
//        dump($ret);
//        $ret = $model->setOne(4, ['name' => 'fff']);
//        dump($ret);
        $ret = $model->delOne(4);
        dump($ret);

//        dump($data);
//        $temp1 = conf::get('CTRL', 'route');
//        $data = 'Hello World';
//        $title = '视图文件';
//        $this->assign('title', $title);
//        $this->assign('data', $data);
//        $this->display('index.html');
//        p('index ctrl');
//        $model = new model();
//        $sql = "SELECT * FROM c";
//        $ret = $model->query($sql);
//        p($ret->fetchAll());
    }
}