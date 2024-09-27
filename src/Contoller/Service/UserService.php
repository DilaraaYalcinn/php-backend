<?php
namespace App\Service;

use App\Db\Database;
use MongoDB\BSON\ObjectId;

class UserService {

    private $collection;

    public function __construct() {
        $db = new Database();
        $this->collection = $db->getCollection('users');
    }

    public function createUser($email, $password, $rememberMe) {
        $hashedPassword = md5($password); 
        $result = $this->collection->insertOne([
            'email' => $email,
            'password' => $hashedPassword,
            'rememberMe' => $rememberMe
        ]);
        return $result->getInsertedId();
    }

    public function authenticate($email, $password) {
        $hashedPassword = md5($password);
        $user = $this->collection->findOne([
            'email' => $email,
            'password' => $hashedPassword
        ]);

        return $user;
    }
}
