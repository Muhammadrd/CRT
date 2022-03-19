<?php

namespace Config;

class RolePermissions
{
    protected $role_permissions = [
        [
            'id_role' => 'admin-001',
            'nama_role' => 'Admin',
            'alias_role' => 'admin',
            'permissions' => '*'
        ],
        [
            'id_role' => 'user-001',
            'nama_role' => 'User',
            'alias_role' => 'user',
            'permissions' => ['user-management']
        ],
    ];

    public function getAllRolePermissions()
    {
        return $this->role_permissions;
    }

    public function getRolePermissions($idRole)
    {
        foreach ($this->role_permissions as $key => $value) {
            if ($value['id_role'] == $idRole) {
                return $value['permissions'];
            }
        }

        return [];
    }
}
