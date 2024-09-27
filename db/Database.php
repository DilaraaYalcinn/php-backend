<?php
require 'vendor/autoload.php';

use MongoDB\Client;

class Database {

    private $client;
    private $db;

    public function __construct() {
        $this->client = new Client('mongodb+srv://dilaraayalcinn:<db_password>@loginapp.i4k66.mongodb.net/?retryWrites=true&w=majority&appName=LoginApp');
        $this->db = $this->client->selectDatabase('loginDB');
    }

    public function getCollection($collection) {
        return $this->db->selectCollection($collection);
    }
}
