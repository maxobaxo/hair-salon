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

    class ClientTest extends PHPUnit_Framework_TestCase
    {
        protected function tearDown()
        {
            // Client::deleteAll();
        }

        function testGetName()
        {
            // Arrange
            $name_st = "Winifred Jones";
            $test_stylist = new Stylist($name_st);
            $test_stylist->save();
            $stylist_id = $test_stylist->getId();

            $name_cl = "Joey Ramone";
            $test_client = new Client($name_cl, $stylist_id);
            $test_client->save();

            // Act
            $result = $test_client->getName();
            // Assert
            $this->assertEquals("Joey Ramone", $result);

        }

        // function testSetName()
        // {
        //     // Arrange
        //     $name_st = "Winifred Jones";
        //     $test_stylist = new Stylist($name_st);
        //     $test_stylist->save();
        //     $stylist_id = $test_stylist->getId();
        //
        //     $name_cl = "Jeffrey Hyman";
        //     $test_client = new Client($name_cl, $stylist_id);
        //     $test_client->save();
        //
        //     $new_name_cl = "Joey Ramone";
        //
        //     // Act
        //     $test_client->setName($new_name_cl);
        //     $result = $test_client->getName();
        //
        //     // Assert
        //     $this->assertEquals("Joey Ramone", $result);
        // }
        //
        // function testGetId()
        // {
        //     // Arrange
        //     $name_st = "Winifred Jones";
        //     $test_stylist = new Stylist($name_st);
        //     $test_stylist->save();
        //     $stylist_id = $test_stylist->getId();
        //
        //     $name_cl = "Joey Ramone";
        //     $test_client = new Client($name_cl, $stylist_id);
        //     $test_client->save();
        //
        //     // Act
        //     $result = $test_client->getId();
        //
        //     // Assert
        //     $this->assertEquals(true, is_numeric($result));
        // }
        //
        // function testSave()
        // {
        //     // Arrange
        //     $name_st = "Winifred Jones";
        //     $test_stylist = new Stylist($name_st);
        //     $test_stylist->save();
        //     $stylist_id = $test_stylist->getId();
        //
        //     $name_cl = "Joey Ramone";
        //     $test_client = new Client($name_cl, $stylist_id);
        //
        //     // Act
        //     $executed = $test_client->save();
        //
        //     // Assert
        //     $this->assertTrue($executed, "The new client has NOT been added to the database");
        // }
        //
        // function testFind()
        // {
        //     // Arrange
        //     $name_st = "Winifred Jones";
        //     $test_stylist = new Stylist($name_st);
        //     $test_stylist->save();
        //     $stylist_id = $test_stylist->getId();
        //
        //     $name_cl = "Joey Ramone";
        //     $test_client = new Client($name_cl, $stylist_id);
        //     $test_client->save();
        //
        //     $name_cl_2 = "Dee Dee Ramone";
        //     $test_client_2 = new Client($name_cl_2, $stylist_id);
        //     $test_client_2->save();
        //
        //     // Act
        //     $result = Client::find($test_client_2->getId());
        //
        //     // Assert
        //     $this->assertEquals($test_client_2, $result);
        // }
        //
        // function testGetAll()
        // {
        //     // Arrange
        //     $name_st = "Winifred Jones";
        //     $test_stylist = new Stylist($name_st);
        //     $test_stylist->save();
        //     $stylist_id = $test_stylist->getId();
        //
        //     $name_cl = "Joey Ramone";
        //     $test_client = new Client($name_cl, $stylist_id);
        //     $test_client->save();
        //
        //     $name_cl_2 = "Dee Dee Ramone";
        //     $test_client_2 = new Client($name_cl_2, $stylist_id);
        //     $test_client_2->save();
        //
        //     // Act
        //     $result = Client::getAll();
        //
        //
        //     // Assert
        //     $this->assertEquals([$test_client, $test_client_2], $result);
        // }
        //
        // function testdeleteAll()
        // {
        //     // Arrange
        //     $name_st = "Winifred Jones";
        //     $test_stylist = new Stylist($name_st);
        //     $test_stylist->save();
        //     $stylist_id = $test_stylist->getId();
        //
        //     $name_cl = "Joey Ramone";
        //     $test_client = new Client($name_cl, $stylist_id);
        //     $test_client->save();
        //
        //     $name_cl_2 = "Dee Dee Ramone";
        //     $test_client_2 = new Client($name_cl_2, $stylist_id);
        //     $test_client_2->save();
        //
        //     // Act
        //     Client::deleteAll();
        //     $result = Client::getAll();
        //
        //     // Assert
        //     $this->assertEquals([], $result);
        // }
        //
        // function testUpdate()
        // {
        //     // Arrange
        //     $name_cl = "Winifred Jones";
        //     $test_client = new Client($name_cl);
        //     $test_client->save();
        //
        //     $name_cl_2 = "Aureliano Mateus";
        //     $test_client_2 = new Client($name_cl_2);
        //     $test_client_2->save();
        //
        //     // Act
        //     $test_client->update();
        //
        //     // Assert
        //     $this->assertEquals([$test_client_2], Client::getAll());
        // }
        //
        // function testDelete()
        // {
        //     // Arrange
        //     $name_cl = "Winifred Jones";
        //     $test_client = new Client($name_cl);
        //     $test_client->save();
        //
        //     $new_name_cl = "Winifred Mateus";
        //
        //     // Act
        //     $test_client->delete($new_name_cl);
        //
        //     // Assert
        //     $this->assertEquals("Winifred Mateus", $test_client->getName());
        // }
    }
?>
