<?php

namespace App\Console\Commands;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class SyncRolePermission extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sync:role-permission';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        try {
            DB::beginTransaction();
            $this->createPermission();

            $this->createRole();
            DB::commit();
        } catch (\Exception $exception) {dd($exception);
            DB::rollBack();
        }
    }

    private function createPermission()
    {
        $createPermissions = [
            Permission::COURSE_CATEGORY_LIST,
            Permission::COURSE_CATEGORY_CREATE,
            Permission::COURSE_CATEGORY_EDIT,
            Permission::COURSE_CATEGORY_DELETE,

            Permission::COURSE_LIST,
            Permission::COURSE_CREATE,
            Permission::COURSE_EDIT,
            Permission::COURSE_DELETE,

            Permission::POST_CATEGORY_LIST,
            Permission::POST_CATEGORY_CREATE,
            Permission::POST_CATEGORY_EDIT,
            Permission::POST_CATEGORY_DELETE,

            Permission::POST_LIST,
            Permission::POST_CREATE,
            Permission::POST_EDIT,
            Permission::POST_DELETE,

            Permission::PAGE_LIST,
            Permission::PAGE_CREATE,
            Permission::PAGE_EDIT,
            Permission::PAGE_DELETE,

            Permission::BANNER_LIST,
            Permission::BANNER_CREATE,
            Permission::BANNER_EDIT,
            Permission::BANNER_DELETE,

            Permission::COURSE_IMAGE_LIST,
            Permission::COURSE_IMAGE_CREATE,
            Permission::COURSE_IMAGE_EDIT,
            Permission::COURSE_IMAGE_DELETE,

            Permission::SUPPORT_CONSULTATION_LIST,

            Permission::ADMIN_LIST,
            Permission::ADMIN_CREATE,
            Permission::ADMIN_EDIT,
            Permission::ADMIN_DELETE,

            Permission::ROLE_LIST,
            Permission::ROLE_CREATE,
            Permission::ROLE_EDIT,
            Permission::ROLE_DELETE,

            Permission::ACCESS_HISTORY_LIST,

            Permission::MAIN_MENU_SETTING_EDIT,

            Permission::WEB_SETTING_EDIT,
        ];

        Permission::whereNotIn('name', $createPermissions)->delete();

        $permissions = Permission::orderBy('id', 'ASC')->get(['name'])->pluck('name')->toArray();

        $permissions = array_diff($createPermissions, $permissions);

        $insert = [];
        $now = now();
        foreach ($permissions as $permission) {
            $insert[] = [
                'name' => $permission,
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }

        Permission::insert($insert);
    }

    private function getAdminPermissions()
    {
        return [
            Permission::COURSE_CATEGORY_LIST,
            Permission::COURSE_CATEGORY_CREATE,
            Permission::COURSE_CATEGORY_EDIT,
            Permission::COURSE_CATEGORY_DELETE,

            Permission::COURSE_LIST,
            Permission::COURSE_CREATE,
            Permission::COURSE_EDIT,
            Permission::COURSE_DELETE,

            Permission::POST_CATEGORY_LIST,
            Permission::POST_CATEGORY_CREATE,
            Permission::POST_CATEGORY_EDIT,
            Permission::POST_CATEGORY_DELETE,

            Permission::POST_LIST,
            Permission::POST_CREATE,
            Permission::POST_EDIT,
            Permission::POST_DELETE,

            Permission::PAGE_LIST,
            Permission::PAGE_CREATE,
            Permission::PAGE_EDIT,
            Permission::PAGE_DELETE,

            Permission::BANNER_LIST,
            Permission::BANNER_CREATE,
            Permission::BANNER_EDIT,
            Permission::BANNER_DELETE,

            Permission::COURSE_IMAGE_LIST,
            Permission::COURSE_IMAGE_CREATE,
            Permission::COURSE_IMAGE_EDIT,
            Permission::COURSE_IMAGE_DELETE,

            Permission::SUPPORT_CONSULTATION_LIST,

            Permission::ADMIN_LIST,
            Permission::ADMIN_CREATE,
            Permission::ADMIN_EDIT,
            Permission::ADMIN_DELETE,

            Permission::ROLE_LIST,
            Permission::ROLE_CREATE,
            Permission::ROLE_EDIT,
            Permission::ROLE_DELETE,

            Permission::ACCESS_HISTORY_LIST,

            Permission::MAIN_MENU_SETTING_EDIT,

            Permission::WEB_SETTING_EDIT,
        ];
    }

    private function createRole()
    {
        $roles = [
            [
                'name' => Role::SUPPER_ADMIN,
                'permissions' => $this->getAdminPermissions()
            ],
            [
                'name' => Role::ADMIN,
                'permissions' => $this->getAdminPermissions()
            ]
        ];

        foreach ($roles as $item) {
            $role = Role::updateOrCreate([
                'name' => $item['name']
            ]);

            $permissionIds = Permission::whereIn('name', $item['permissions'])->pluck('id')->toArray();

            $role->permissions()->sync($permissionIds);
        }
    }
}
