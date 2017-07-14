<?php

    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */

    require_once 'src/Client.php';
    require_once 'src/Stylist.php';

//ADD A DATABASE NAME!!
    $server = 'mysql:host=localhost:8889;dbname=salon_test'
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);

    class ItemTest extends PHPUnit_Framework_TestCase
    {

    }
?>
