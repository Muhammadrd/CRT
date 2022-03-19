<?php

namespace Config;

class AppPermissions
{
    protected $permissions = [
        [
            'menu' => 'User Management',
            'alias_permission' => 'user-management',
            'url' => '/user-management'
        ],
    ];

    public function getPermissions()
    {
        return $this->permissions;
    }

    public function getOnePermission($alias)
    {
        foreach ($this->permissions as $key => $value) {
            if ($value['alias_permission'] == $alias) {
                return $value;
            }
        }

        return [];
    }
}
