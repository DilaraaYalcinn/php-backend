<?php
namespace App\Controller;

use App\Service\UserService;
use Exception;

class LoginController {

    private $userService;

    public function __construct() {
        $this->userService = new UserService();
    }

     /**
     * Handles the login process
     * @param string $email - User's email address
     * @param string $password - User's password
     * @param bool $rememberMe - Remember me option
     * @return string - JSON response with status and message
     */
    public function login($email, $password, $rememberMe) {
        try {
            $user = $this->userService->authenticate($email, $password);

            if ($user) {
                return json_encode([
                    'status' => 'ok',
                    'message' => 'Hello ' . $user['email'] . ', you are logged in as ' . $user['email']
                ]);
            } else {
                return json_encode([
                    'status' => 'error',
                    'message' => 'Invalid credentials'
                ]);
            }
        } catch (Exception $e) {
            return json_encode([
                'status' => 'error',
                'message' => $e->getMessage()
            ]);
        }
    }
}
