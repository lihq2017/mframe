<?php
/**
 * Created by PhpStorm.
 * User: lihq
 * Date: 2018/12/11
 * Time: 11:38
 */
namespace app\model;

use core\lib\model;

class cModel extends model
{
    public $table = 'c';

    public function lists()
    {
        $ret = $this->select($this->table, '*');
        return $ret;
    }

    public function getOne($id)
    {
        $ret = $this->get($this->table, '*', [
            'id' => $id
        ]);
        return $ret;
    }

    public function setOne($id, $data)
    {
        $ret = $this->update($this->table, $data, [
            'id' => $id,
        ]);
        return $ret;
    }

    public function delOne($id)
    {
        return $this->delete($this->table, ['id' => $id]);
    }
}