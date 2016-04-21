<?php
namespace Itb;

use Monolog\Logger;

class DvdRepository
{
    public function getAll()
    {
        $db = new DatabaseManager();
        $connection = $db->getDbh();

        $statement = $connection->prepare('SELECT * from martial');
        $statement->setFetchMode(\PDO::FETCH_CLASS, '\\Itb\\Martial');//       $statement->setFetchMode(\PDO::FETCH_CLASS, '\\Itb\\Dvd');
        $statement->execute();

        $martial = $statement->fetchAll();

        return $martial;
    }

    public function getOneById($id)
    {
        $db = new DatabaseManager();
        $connection = $db->getDbh();

        $statement = $connection->prepare('SELECT * from martial WHERE id=:id');
        $statement->bindParam(':id', $id);
        $statement->setFetchMode(\PDO::FETCH_CLASS, '\\Itb\\Martial');
        //$statement->setFetchMode(\PDO::FETCH_CLASS, '\\Itb\\Dvd');
        $statement->execute();

        if ($martial = $statement->fetch()) {

            return $martial;
        }
        else {

            return null;
        }
    }
}