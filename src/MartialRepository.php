<?php
/**
 * namespace Itb
 */
namespace Itb;

/**
 * use Monolog for logging
 */
use Monolog\Logger;

/**
 * Class MartialRepository
 * @package Itb
 */
class MartialRepository
{
    /**
     * returns all values in database
     * @return array
     */
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

    /**
     * returns log of users
     * @return array
     */
    public function getLoggedIn()
    {
        $db = new DatabaseManager();
        $connection = $db->getDbh();

        $statement = $connection->prepare('SELECT * from LogIn');
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

    /**
     * gets all the users one by one by their id
     * @param $id
     * @return mixed|null
     */
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
