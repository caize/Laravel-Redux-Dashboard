<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\Permission;
class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permission_role')->delete();
        DB::table('roles')->delete();
        DB::table('permissions')->delete();

        $admin = (new Role())->fill(['name' => 'admin', 'display_name' => 'Administrator', 'description' => 'User is allowed to manage and edit other users']);
        $admin->save();

        $read_users=(new Permission())->fill(['name' => 'read-users', 'display_name' => 'Read Users', 'description' => '']);
        $edit_user->save();
        $edit_user=(new Permission())->fill(['name' => 'edit-user', 'display_name' => 'Edit User', 'description' => '']);
        $edit_user->save();
        $delete_user=(new Permission())->fill(['name' => 'delete-user', 'display_name' => 'Delete User', 'description' => '']);
        $delete_user->save();

        $edit_permission=(new Permission())->fill(['name' => 'edit-permission', 'display_name' => 'Edit Permission', 'description' => '']);
        $edit_permission->save();

        $create_role= (new Permission())->fill(['name' => 'create-role', 'display_name' => 'Create Role', 'description' => '']);
        $create_role->save();
        $edit_role=(new Permission())->fill(['name' => 'edit-role', 'display_name' => 'Edit Role', 'description' => '']);
        $edit_role->save();
        $delete_role=(new Permission())->fill(['name' => 'delete-role', 'display_name' => 'delete Role', 'description' => '']);
        $delete_role->save();

        $read_user_roles= (new Permission())->fill(['name' => 'read-user-roles', 'display_name' => 'Read User Roles', 'description' => '']);
        $read_user_roles->save();
        $edit_user_roles= (new Permission())->fill(['name' => 'edit-user-roles', 'display_name' => 'Edit User Roles', 'description' => '']);
        $edit_user_roles->save();

        $read_role_permissions= (new Permission())->fill(['name' => 'read-role-permissions', 'display_name' => 'Read Role Permissions', 'description' => '']);
        $read_role_permissions->save();
        $edit_role_permissions= (new Permission())->fill(['name' => 'edit-role-permissions', 'display_name' => 'Edit Role Permissions', 'description' => '']);
        $edit_role_permissions->save();

        $admin->attachPermissions(array($read_users,\
        $edit_user,\
        $delete_user,\
        $edit_permission,\
        $create_role,\
        $edit_role,\
        $delete_role,\
        $read_user_roles,\
        $edit_user_roles,\
        $read_role_permissions,\
        $edit_role_permissions));
        $admin->save();
    }
}
