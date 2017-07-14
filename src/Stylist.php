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
            $this->name_st = $new_name_st;
        }

        function getName()
        {
            return $this->name_st;
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

        function getId()
        {
            return $this->id;
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

        function update()
        {

        }

        function delete()
        {

        }

        static function getAll()
        {

        }

        static function deleteAll()
        {

        }
    }
?>
