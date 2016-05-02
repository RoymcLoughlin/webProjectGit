<?php
namespace Itb;

use Monolog\Logger;

class MartialRepository
{
    public function getAll()
    {
        $db = new DatabaseManager();
        $connection = $db->getDbh();

        $statement = $connection->prepare('SELECT * from martialartsclass');
        $statement->setFetchMode(\PDO::FETCH_CLASS, '\\Itb\\Martial');
        $statement->execute();

        /*
        $dvds = [];
        while ($dvd = $statement->fetch()) {

            $outputAsString = true;
            $message = print_r($dvd, $outputAsString);
            $log->addDebug($message);

            print '<pre>';
            print_r($dvd);

            // append Dvd object to end of our array
            $dvds[] = $dvd;
        }
        */

        $martial = $statement->fetchAll();

        return $martial;
    }

    public function getOneById($id)
    {
        $db = new DatabaseManager();
        $connection = $db->getDbh();

        $statement = $connection->prepare('SELECT * from martialartsclass WHERE id=:id');
        $statement->bindParam(':id', $id);
        $statement->setFetchMode(\PDO::FETCH_CLASS, '\\Itb\\Martial');
        $statement->execute();

        if ($martial = $statement->fetch()) {
            return $martial;
        } else {
            return null;
        }
    }


}