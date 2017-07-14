<?php
    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */

    require_once 'src/Client.php';
    require_once 'src/Stylist.php';

    $server = 'mysql:host=localhost:8889;dbname=hair_salon_test';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);

    class StylistTest extends PHPUnit_Framework_TestCase
    {

        function testGetName()
        {
            // Arrange
            $name_st = "Winifred Jones";
            $test_stylist = new Stylist($name_st);
            $test_stylist->save();

            // Act
            $result = $test_stylist->getName();
            // Assert
            $this->assertEquals("Winifred Jones", $result);

        }

        function testSetName()
        {
            // Arrange
            $name_st = "Winifred Jones";
            $test_stylist = new Stylist($name_st);
            $test_stylist->save();

            $new_name_st = "Winifred Mateus";

            // Act
            $test_stylist->setName($new_name_st);
            $result = $test_stylist->getName();

            // Assert
            $this->assertEquals("Winifred Mateus", $result);
        }

        function testSave()
        {
            // Arrange
            $name_st = "Winifred Jones";
            $test_stylist = new Stylist($name_st);

            // Act
            $executed = $test_stylist->save();

            // Assert
            $this->assertTrue($executed, "The new stylist has NOT been added to the database");

        }
    }
?>
