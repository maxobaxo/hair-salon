<?php
    class Client
    {
        private $name_cl;
        private $stylist_id;
        private $id;

        function __construct($name_cl, $id = null)
        {
            $this->name_cl = $name_cl;
            $this->id = $id;
        }

        function setName($new_name_cl)
        {
            $this->name_cl = (string) $new_name_cl;
        }

        function getName()
        {
            return $this->name_cl;
        }

        function getId()
        {

        }

        function getCuisineId()
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

        function save()
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
