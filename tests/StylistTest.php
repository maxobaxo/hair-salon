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
        protected function tearDown()
        {
            Stylist::deleteAll();
            // Client::deleteAll();
        }

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

        function testGetId()
        {
            // Arrange
            $name_st = "Winifred Jones";
            $test_stylist = new Stylist($name_st);
            $test_stylist->save();

            // Act
            $result = $test_stylist->getId();

            // Assert
            $this->assertEquals(true, is_numeric($result));
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

        function testFind()
        {
            // Arrange
            $name_st = "Winifred Jones";
            $test_stylist = new Stylist($name_st);
            $test_stylist->save();

            $name_st_2 = "Aureliano Mateus";
            $test_stylist_2 = new Stylist($name_st_2);
            $test_stylist_2->save();

            // Act
            $result = Stylist::find($test_stylist_2->getId());

            // Assert
            $this->assertEquals($test_stylist_2, $result);
        }

        function testGetAll()
        {
            // Arrange
            $name_st = "Winifred Jones";
            $test_stylist = new Stylist($name_st);
            $test_stylist->save();

            $name_st_2 = "Aureliano Mateus";
            $test_stylist_2 = new Stylist($name_st_2);
            $test_stylist_2->save();

            // Act
            $result = Stylist::getAll();


            // Assert
            $this->assertEquals([$test_stylist, $test_stylist_2], $result);
        }

        function testdeleteAll()
        {
            // Arrange
            $name_st = "Winifred Jones";
            $test_stylist = new Stylist($name_st);
            $test_stylist->save();

            $name_st_2 = "Aureliano Mateus";
            $test_stylist_2 = new Stylist($name_st_2);
            $test_stylist_2->save();

            // Act
            Stylist::deleteAll();
            $result = Stylist::getAll();

            // Assert
            $this->assertEquals([], $result);
        }

        function testUpdate()
        {
            // Arrange
            $name_st = "Winifred Jones";
            $test_stylist = new Stylist($name_st);
            $test_stylist->save();

            $name_st_2 = "Aureliano Mateus";
            $test_stylist_2 = new Stylist($name_st_2);
            $test_stylist_2->save();

            $new_name_st = "Winifred Mateus";

            // Act
            $test_stylist->update($new_name_st);

            // Assert
            $this->assertEquals("Winifred Mateus", $test_stylist->getName());
        }

        function testDelete()
        {
            // Arrange
            $name_st = "Winifred Jones";
            $test_stylist = new Stylist($name_st);
            $test_stylist->save();

            $name_st_2 = "Aureliano Mateus";
            $test_stylist_2 = new Stylist($name_st_2);
            $test_stylist_2->save();

            // Act
            $test_stylist->delete();

            // Assert
            $this->assertEquals([$test_stylist_2], Stylist::getAll());
        }
    }
?>
