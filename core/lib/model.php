<?php
/**
 * Created by PhpStorm.
 * User: lihq
 * Date: 2018/11/11
 * Time: 9:54
 */
namespace core\lib;

class model extends \PDO
{
    public function __construct()
    {
        $dsn = 'mysql:host=localhost;dbname=mframe';
        $username = 'root';
        $passwd = 'root';
        $options = [];
        try{
            parent::__construct($dsn, $username, $passwd, $options);
        } catch (\PDOException $e){
            p($e->getMessage());
        }

    }
}