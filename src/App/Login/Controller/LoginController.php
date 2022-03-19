<?php

namespace App\Login\Controller;

use App\Login\Model\Login;
use App\UserManagement\Model\UserManagement;
use Config\AppPermissions;
use Config\RolePermissions;
use Core\Classes\SessionData;
use PDOException;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;

class LoginController
{
    public $login;
    public $user;

    public function __construct()
    {
        $this->login = new Login();
        $this->user = new UserManagement();
    }

    public function index(Request $request)
    {
        // $errors = $request->getSession()->getFlashBag()->get('errors', []);
        // dd($errors);
        // $errors = $request->getSession()->get('errors', []);

        return render_template('auth/login', [
            // 'errors' => $errors
        ]);
    }

    public function login(Request $request)
    {

        $email = $request->request->get('username');
        $password = $request->request->get('password');

        return $this->login->auth($email, $password);
    }


    public function logout(Request $request)
    {
        SessionData::get()->invalidate();

        return new RedirectResponse('/admin');
    }
}
