<?php
/**
 * Created by PhpStorm.
 * User: Legion
 * Date: 7/10/2019
 * Time: 9:02 PM
 */

namespace Database;


class PDOResultSet implements ResultSetInterface
{

    private $pdoStatement;

    public function __construct(\PDOStatement $pdoStatement)
    {
        $this->pdoStatement = $pdoStatement;
    }

    public function fetch($className) : \Generator
    {
        while ($row = $this->pdoStatement->fetchObject($className)) {
            yield $row;
        }
    }
}