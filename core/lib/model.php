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
    /**
     * model constructor.
     * @throws \Exception
     */
    public function __construct()
    {
        $database = conf::all('database');
        try{
            parent::__construct($database['DSN'], $database['USERNAME'], $database['PASSWORD'], $database['OPTIONS']);
        } catch (\PDOException $e){
            p($e->getMessage());
        }

    }
}