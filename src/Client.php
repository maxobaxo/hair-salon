<?php
    class Client
    {
        private $name_cl;
        private $stylist_id;
        private $id;

        function __construct($name_cl, $stylist_id, $id = null)
        {
            $this->name_cl = $name_cl;
            $this->stylist_id = $stylist_id;
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
            return $this->id;
        }

        function getStylistId()
        {
            return $this->stylist_id;
        }

        function find($search_id)
        {
            // $found_client = null;
            // $returned_clients = $GLOBALS['DB']->prepare("SELECT * FROM clients WHERE id = :id");
            // $returned_clients->bindParam(':id', $search_id, PDO::PARAM_STR);
            // $returned_clients->execute();
            // foreach($returned_clients as $client) {
            //     $name_cl = $client['name'];
            //     $stylist_id = $client['stylist_id'];
            //     $id = $client['id'];
            //     if ($id == $search_id) {
            //         $found_client = new Client($name_cl, $stylist_id, $id);
            //     }
            // }
            // return $found_client;
        }

        function update()
        {

        }

        function delete()
        {

        }

        function save()
        {
            $executed = $GLOBALS['DB']->exec("INSERT INTO clients (name_cl, stylist_id) VALUES ('{$this->getName()}', {$this->getStylistId()})");
            if ($executed) {
                $this->id = $GLOBALS['DB']->lastInsertId();
                return true;
            } else {
                return false;
            }
        }

        static function getAll()
        {

        }

        static function deleteAll()
        {

        }
    }
?>
