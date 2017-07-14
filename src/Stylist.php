<?php
    class Stylist
    {
        private $name_st;
        private $id;

        function __construct($name_st, $id = null)
        {
            $this->name_st = $name_st;
            $this->id = $id;
        }

        function setName($new_name_st)
        {
            $this->name_st = (string) $new_name_st;
        }

        function getName()
        {
            return $this->name_st;
        }

        function getId()
        {
            return $this->id;
        }

        function save()
        {
            $executed = $GLOBALS['DB']->exec("INSERT INTO stylists (name_st) VALUES ('{$this->getName()}')");
            if ($executed) {
                $this->id = $GLOBALS['DB']->lastInsertId();
                return true;
            } else {
                return false;
            }
        }


        static function find($search_id)
        {
            $found_stylist = null;
            $returned_stylists = $GLOBALS['DB']->prepare("SELECT * FROM stylists WHERE id = :id");
            $returned_stylists->bindParam(':id', $search_id, PDO::PARAM_STR);
            $returned_stylists->execute();
            foreach($returned_stylists as $stylist) {
                $name_st = $stylist['name_st'];
                $id = $stylist['id'];
                if ($id == $search_id) {
                    $found_stylist = new Stylist($name_st, $id);
                }
            }
            return $found_stylist;
        }

        function update($new_name_st)
        {
            $executed = $GLOBALS['DB']->exec("UPDATE stylists SET name_st = '{$new_name_st}' WHERE id = {$this->getId()}");
            if ($executed) {
                $this->setName($new_name_st);
                return true;
            } else {
                return false;
            }
        }

        function delete()
        {
            $executed = $GLOBALS['DB']->exec("DELETE FROM stylists WHERE id = {$this->getId()};");
            if ($executed) {
                return true;
            } else {
                return false;
            }
        }

        static function getAll()
        {
            $returned_stylists = $GLOBALS['DB']->query("SELECT * FROM stylists;");
            $all_stylists = array();
            foreach ($returned_stylists as $stylist) {
                $name_st = $stylist['name_st'];
                $id = $stylist['id'];
                $new_stylist = new Stylist($name_st, $id);
                array_push($all_stylists, $new_stylist);
            }
            return $all_stylists;
        }

        static function deleteAll()
        {
            $executed = $GLOBALS['DB']->exec("DELETE FROM stylists;");
            if ($executed) {
                return true;
            } else {
                return false;
            }
        }
    }
?>
