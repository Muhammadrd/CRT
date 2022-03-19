<?php

namespace App\Login\Model;

use App\QueryBuilder\Model\QueryBuilder;
use Core\Classes\SessionData;
use Symfony\Component\HttpFoundation\RedirectResponse;

class Login extends QueryBuilder
{
    protected $table = 'users';
    protected $primaryKey = 'id_user';

    public function auth(string $username, string $password)
    {
        $user = $this->leftJoin('roles', 'roles.id_role', '=', 'users.id_role')->where('username', $username)->first();

        if ($user != null) {
            if (password_verify($password, $user['password'])) {

                SessionData::set('id_user', $user['id_user']);
                SessionData::set('nama_user', $user['nama_user']);
                SessionData::set('id_role', $user['id_role']);
                SessionData::set('nama_role', $user['nama_role']);
                SessionData::set('alias_role', $user['alias_role']);

                return new RedirectResponse('/minat');
            } else {
                SessionData::get()->getFlashBag()->add('errors', 'Password salah!');
            }
        } else {
            SessionData::get()->getFlashBag()->add('errors', 'Akun tidak ditemukan!');
        }

        return new RedirectResponse('/admin');
    }
}
