<?php

namespace App\Services\Admin;

use App\Models\Admin;
use Illuminate\Support\Facades\Auth;

class CommonService
{

    /**
     * Get roles
     *
     * @return array
     */
    public function getRoles ($equal = false)
    {
        $roles = Admin::$roles;

        $user = Auth::user();

        if ($equal) {
            switch ($user->role) {
                case Admin::ROLE_VIEWER:
                    unset($roles[Admin::ROLE_EDITOR]);
                case Admin::ROLE_EDITOR:
                    unset($roles[Admin::ROLE_ADMIN]);
                case Admin::ROLE_MANAGER:
                    unset($roles[Admin::ROLE_MANAGER]);
                case Admin::ROLE_ADMIN:
                    unset($roles[Admin::ROLE_SUPPER_ADMIN]);
            }
        } else {
            switch ($user->role) {
                case Admin::ROLE_VIEWER:
                    unset($roles[Admin::ROLE_VIEWER]);
                case Admin::ROLE_EDITOR:
                    unset($roles[Admin::ROLE_EDITOR]);
                case Admin::ROLE_MANAGER:
                    unset($roles[Admin::ROLE_MANAGER]);
                case Admin::ROLE_ADMIN:
                    unset($roles[Admin::ROLE_ADMIN]);
                case Admin::ROLE_SUPPER_ADMIN:
                    unset($roles[Admin::ROLE_SUPPER_ADMIN]);
            }
        }

        return $roles;
    }
}
