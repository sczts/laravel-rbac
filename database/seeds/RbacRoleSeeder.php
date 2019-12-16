<?php

use Eiixy\Rbac\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;


class RbacRoleSeeder extends Seeder
{
    public function run()
    {
        //
        $data = $this->data();

        foreach ($data as $item) {
            $permissions = Arr::pull($item, 'permissions');
            $role = Role::create($item);
            $role->permissions->save($permissions);
        }
    }


    private function data()
    {
        return [
            [
                'name' => '管理员',
                'description' => '拥有所有权限',
                'permissions' => [1,2,3,4,5,6,7,8,9]
            ],
            [
                'name' => '角色1',
                'description' => '查看权限列表，管理角色权限',
                'permissions' => [1,2,3,4,5,6]
            ],
            [
                'name' => '角色2',
                'description' => '查看权限列表，查看角色列表',
                'permissions' => [1,2,6]
            ]
        ];
    }
}
