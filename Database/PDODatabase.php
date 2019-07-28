<?php
/**
 * Created by PhpStorm.
 * User: Legion
 * Date: 7/10/2019
 * Time: 8:57 PM
 */

namespace Database;


class PDODatabase implements DatabaseInterface
{
    private $pdo;

    public function __construct(\PDO $pdo)
    {
        $this->pdo = $pdo;
    }


    public function query(string $query) : StatementInterface
    {
        $statement = $this->pdo->prepare($query);
        return new PDOPreparedStatement($statement);
    }
}