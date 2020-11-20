<?php

namespace App;

use PDO;
use PDOException;

class Database
{
    public function connect()
    {
        try {
            $db = new PDO('mysql:host=localhost;dbname=test_db', 'root', '');
        } catch (PDOException $e) {
            print $e->getMessage();
            die();
        }
        return $db;
    }
}