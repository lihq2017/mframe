<?php
/**
 * Created by PhpStorm.
 * User: lihq
 * Date: 2018/11/11
 * Time: 9:54
 */
namespace core\lib;

use Medoo\Medoo;

class model extends Medoo
{
    /**
     * model constructor.
     * @throws \Exception
     */
    public function __construct()
    {
        $option = conf::all('database');
        parent::__construct($option);
    }
}