<?php

namespace App\Models;

class Permission extends AbstractModel
{

    const COURSE_CATEGORY_LIST = 'list-course-category';
    const COURSE_CATEGORY_CREATE = 'create-course-category';
    const COURSE_CATEGORY_EDIT = 'edit-course-category';
    const COURSE_CATEGORY_DELETE = 'delete-course-category';

    const COURSE_LIST = 'list-course';
    const COURSE_CREATE = 'create-course';
    const COURSE_EDIT = 'edit-course';
    const COURSE_DELETE = 'delete-course';

    const POST_CATEGORY_LIST = 'list-post-category';
    const POST_CATEGORY_CREATE = 'create-post-category';
    const POST_CATEGORY_EDIT = 'edit-post-category';
    const POST_CATEGORY_DELETE = 'delete-post-category';

    const POST_LIST = 'list-post';
    const POST_CREATE = 'create-post';
    const POST_EDIT = 'edit-post';
    const POST_DELETE = 'delete-post';

    const PAGE_LIST = 'list-page';
    const PAGE_CREATE = 'create-page';
    const PAGE_EDIT = 'edit-page';
    const PAGE_DELETE = 'delete-page';

    const BANNER_LIST = 'list-banner';
    const BANNER_CREATE = 'create-banner';
    const BANNER_EDIT = 'edit-banner';
    const BANNER_DELETE = 'delete-banner';

    const COURSE_IMAGE_LIST = 'list-course-image';
    const COURSE_IMAGE_CREATE = 'create-course-image';
    const COURSE_IMAGE_EDIT = 'edit-course-image';
    const COURSE_IMAGE_DELETE = 'delete-course-image';

    const SUPPORT_CONSULTATION_LIST = 'list-support-and-consultation';

    const ADMIN_LIST = 'list-admin';
    const ADMIN_CREATE = 'create-admin';
    const ADMIN_EDIT = 'edit-admin';
    const ADMIN_DELETE = 'delete-admin';

    const ROLE_LIST = 'list-role';
    const ROLE_CREATE = 'create-role';
    const ROLE_EDIT = 'edit-role';
    const ROLE_DELETE = 'delete-role';

    const ACCESS_HISTORY_LIST = 'list-access-history';

    const MAIN_MENU_SETTING_EDIT = 'edit-main-menu-setting';

    const WEB_SETTING_EDIT = 'edit-web-setting';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'permissions';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
    ];
}
