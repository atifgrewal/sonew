<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_create',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
            ],
            [
                'id'    => 5,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 6,
                'title' => 'permission_access',
            ],
            [
                'id'    => 7,
                'title' => 'role_create',
            ],
            [
                'id'    => 8,
                'title' => 'role_edit',
            ],
            [
                'id'    => 9,
                'title' => 'role_show',
            ],
            [
                'id'    => 10,
                'title' => 'role_delete',
            ],
            [
                'id'    => 11,
                'title' => 'role_access',
            ],
            [
                'id'    => 12,
                'title' => 'user_create',
            ],
            [
                'id'    => 13,
                'title' => 'user_edit',
            ],
            [
                'id'    => 14,
                'title' => 'user_show',
            ],
            [
                'id'    => 15,
                'title' => 'user_delete',
            ],
            [
                'id'    => 16,
                'title' => 'user_access',
            ],
            [
                'id'    => 17,
                'title' => 'player_create',
            ],
            [
                'id'    => 18,
                'title' => 'player_edit',
            ],
            [
                'id'    => 19,
                'title' => 'player_show',
            ],
            [
                'id'    => 20,
                'title' => 'player_delete',
            ],
            [
                'id'    => 21,
                'title' => 'player_access',
            ],
            [
                'id'    => 22,
                'title' => 'coach_category_create',
            ],
            [
                'id'    => 23,
                'title' => 'coach_category_edit',
            ],
            [
                'id'    => 24,
                'title' => 'coach_category_show',
            ],
            [
                'id'    => 25,
                'title' => 'coach_category_delete',
            ],
            [
                'id'    => 26,
                'title' => 'coach_category_access',
            ],
            [
                'id'    => 27,
                'title' => 'sport_create',
            ],
            [
                'id'    => 28,
                'title' => 'sport_edit',
            ],
            [
                'id'    => 29,
                'title' => 'sport_show',
            ],
            [
                'id'    => 30,
                'title' => 'sport_delete',
            ],
            [
                'id'    => 31,
                'title' => 'sport_access',
            ],
            [
                'id'    => 32,
                'title' => 'so_player_access',
            ],
            [
                'id'    => 33,
                'title' => 'coach_access',
            ],
            [
                'id'    => 34,
                'title' => 'audit_log_show',
            ],
            [
                'id'    => 35,
                'title' => 'audit_log_access',
            ],
            [
                'id'    => 36,
                'title' => 'content_management_access',
            ],
            [
                'id'    => 37,
                'title' => 'content_category_create',
            ],
            [
                'id'    => 38,
                'title' => 'content_category_edit',
            ],
            [
                'id'    => 39,
                'title' => 'content_category_show',
            ],
            [
                'id'    => 40,
                'title' => 'content_category_delete',
            ],
            [
                'id'    => 41,
                'title' => 'content_category_access',
            ],
            [
                'id'    => 42,
                'title' => 'content_tag_create',
            ],
            [
                'id'    => 43,
                'title' => 'content_tag_edit',
            ],
            [
                'id'    => 44,
                'title' => 'content_tag_show',
            ],
            [
                'id'    => 45,
                'title' => 'content_tag_delete',
            ],
            [
                'id'    => 46,
                'title' => 'content_tag_access',
            ],
            [
                'id'    => 47,
                'title' => 'content_page_create',
            ],
            [
                'id'    => 48,
                'title' => 'content_page_edit',
            ],
            [
                'id'    => 49,
                'title' => 'content_page_show',
            ],
            [
                'id'    => 50,
                'title' => 'content_page_delete',
            ],
            [
                'id'    => 51,
                'title' => 'content_page_access',
            ],
            [
                'id'    => 52,
                'title' => 'faq_management_access',
            ],
            [
                'id'    => 53,
                'title' => 'faq_category_create',
            ],
            [
                'id'    => 54,
                'title' => 'faq_category_edit',
            ],
            [
                'id'    => 55,
                'title' => 'faq_category_show',
            ],
            [
                'id'    => 56,
                'title' => 'faq_category_delete',
            ],
            [
                'id'    => 57,
                'title' => 'faq_category_access',
            ],
            [
                'id'    => 58,
                'title' => 'faq_question_create',
            ],
            [
                'id'    => 59,
                'title' => 'faq_question_edit',
            ],
            [
                'id'    => 60,
                'title' => 'faq_question_show',
            ],
            [
                'id'    => 61,
                'title' => 'faq_question_delete',
            ],
            [
                'id'    => 62,
                'title' => 'faq_question_access',
            ],
            [
                'id'    => 63,
                'title' => 'sports_type_create',
            ],
            [
                'id'    => 64,
                'title' => 'sports_type_edit',
            ],
            [
                'id'    => 65,
                'title' => 'sports_type_show',
            ],
            [
                'id'    => 66,
                'title' => 'sports_type_delete',
            ],
            [
                'id'    => 67,
                'title' => 'sports_type_access',
            ],
            [
                'id'    => 68,
                'title' => 'sportslist_access',
            ],
            [
                'id'    => 69,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
