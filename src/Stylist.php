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

        }

        function find()
        {

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
