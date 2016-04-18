<?php

namespace Itb;

class DatabaseManager
{
    /**
     * gets the hosts name from the config constant
     * @var string
     */

    private $host = DB_HOST;

    /**
     * get DB username from the config constant
     * @var string
     */

    private $user = DB_USER;

    /**
     * get DB password from the config constant
     * @var string
     */

    private $pass = DB_PASS;

    /**
     * get DB name from the config constant
     * @var string
     */

    private $dbname = DB_NAME;

    /**
     * the DataBase Handler is our db connection object
     * @var database handler
     */

    private $dbh;

    /**
     * catches any error generated
     * @var string
     */

    private $error;

    public function __construct()
    {
        // DSN - the Data Source Name - required by the PDO to connect // Matts comment.

        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbname;

        try {
            // Sets the options

            $options = array(

                \PDO::ATTR_PERSISTENT => true,
                \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION

            );

            $this->dbh = new \PDO($dsn, $this->user, $this->pass, $options);
        }catch (\PDOException $e) {

            $this->error = $e->getMessage();
            print 'Sorry - an error occurred in the database  - please contact the site administrator ...';
            print '<br>';
            print  $e->getMessage();
        }
    }

    public function getDbh()
    {
        return $this->dbh;
    }

}