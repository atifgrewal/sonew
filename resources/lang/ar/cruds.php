<?php

return [
    'userManagement' => [
        'title'          => 'إدارة المستخدمين',
        'title_singular' => 'إدارة المستخدمين',
    ],
    'permission' => [
        'title'          => 'الصلاحيات',
        'title_singular' => 'الصلاحية',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'title'             => 'Title',
            'title_helper'      => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'role' => [
        'title'          => 'المجموعات',
        'title_singular' => 'مجموعة',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'title'              => 'Title',
            'title_helper'       => ' ',
            'permissions'        => 'Permissions',
            'permissions_helper' => ' ',
            'created_at'         => 'Created at',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => ' ',
        ],
    ],
    'user' => [
        'title'          => 'المستخدمين',
        'title_singular' => 'مستخدم',
        'fields'         => [
            'id'                       => 'ID',
            'id_helper'                => ' ',
            'name'                     => 'Name',
            'name_helper'              => ' ',
            'email'                    => 'Email',
            'email_helper'             => ' ',
            'email_verified_at'        => 'Email verified at',
            'email_verified_at_helper' => ' ',
            'password'                 => 'Password',
            'password_helper'          => ' ',
            'roles'                    => 'Roles',
            'roles_helper'             => ' ',
            'remember_token'           => 'Remember Token',
            'remember_token_helper'    => ' ',
            'created_at'               => 'Created at',
            'created_at_helper'        => ' ',
            'updated_at'               => 'Updated at',
            'updated_at_helper'        => ' ',
            'deleted_at'               => 'Deleted at',
            'deleted_at_helper'        => ' ',
            'phone_number'             => 'Phone Number',
            'phone_number_helper'      => ' ',
            'approved'                 => 'Approved',
            'approved_helper'          => ' ',
            'profile_picture'          => 'Profile Picture',
            'profile_picture_helper'   => ' ',
        ],
    ],
    'player' => [
        'title'          => 'Players',
        'title_singular' => 'Player',
        'fields'         => [
            'id'                     => 'ID',
            'id_helper'              => ' ',
            'profilephoto'           => 'Profilephoto',
            'profilephoto_helper'    => ' ',
            'dob'                    => 'DOB',
            'dob_helper'             => ' ',
            'adress_line_1'          => 'Adress Line 1',
            'adress_line_1_helper'   => ' ',
            'address_line_2'         => 'Address Line 2',
            'address_line_2_helper'  => ' ',
            'city'                   => 'City',
            'city_helper'            => ' ',
            'disable_partner'        => 'Disable or Partner',
            'disable_partner_helper' => ' ',
            'disability_type'        => 'Disability type and severity',
            'disability_type_helper' => ' ',
            'created_at'             => 'Created at',
            'created_at_helper'      => ' ',
            'updated_at'             => 'Updated at',
            'updated_at_helper'      => ' ',
            'deleted_at'             => 'Deleted at',
            'deleted_at_helper'      => ' ',
            'name'                   => 'Full Name',
            'name_helper'            => ' ',
            'childparent'            => 'Child Parent',
            'childparent_helper'     => ' ',
        ],
    ],
    'coachCategory' => [
        'title'          => 'Coach Category',
        'title_singular' => 'Coach Category',
        'fields'         => [
            'id'                    => 'ID',
            'id_helper'             => ' ',
            'coach_category'        => 'Coach Category',
            'coach_category_helper' => ' ',
            'created_at'            => 'Created at',
            'created_at_helper'     => ' ',
            'updated_at'            => 'Updated at',
            'updated_at_helper'     => ' ',
            'deleted_at'            => 'Deleted at',
            'deleted_at_helper'     => ' ',
            'coachtype'             => 'Coach Type',
            'coachtype_helper'      => ' ',
            'info'                  => 'Info',
            'info_helper'           => ' ',
        ],
    ],
    'sport' => [
        'title'          => 'Sports',
        'title_singular' => 'Sport',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'sport'              => 'Sport Name',
            'sport_helper'       => ' ',
            'created_at'         => 'Created at',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => ' ',
            'description'        => 'Description',
            'description_helper' => ' ',
        ],
    ],
    'soPlayer' => [
        'title'          => 'SO Players',
        'title_singular' => 'SO Player',
    ],
    'coach' => [
        'title'          => 'Coaches',
        'title_singular' => 'Coach',
    ],
    'auditLog' => [
        'title'          => 'Audit Logs',
        'title_singular' => 'Audit Log',
        'fields'         => [
            'id'                  => 'ID',
            'id_helper'           => ' ',
            'description'         => 'Description',
            'description_helper'  => ' ',
            'subject_id'          => 'Subject ID',
            'subject_id_helper'   => ' ',
            'subject_type'        => 'Subject Type',
            'subject_type_helper' => ' ',
            'user_id'             => 'User ID',
            'user_id_helper'      => ' ',
            'properties'          => 'Properties',
            'properties_helper'   => ' ',
            'host'                => 'Host',
            'host_helper'         => ' ',
            'created_at'          => 'Created at',
            'created_at_helper'   => ' ',
            'updated_at'          => 'Updated at',
            'updated_at_helper'   => ' ',
        ],
    ],
    'contentManagement' => [
        'title'          => 'Content management',
        'title_singular' => 'Content management',
    ],
    'contentCategory' => [
        'title'          => 'Categories',
        'title_singular' => 'Category',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'name'              => 'Name',
            'name_helper'       => ' ',
            'slug'              => 'Slug',
            'slug_helper'       => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated At',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted At',
            'deleted_at_helper' => ' ',
        ],
    ],
    'contentTag' => [
        'title'          => 'Tags',
        'title_singular' => 'Tag',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'name'              => 'Name',
            'name_helper'       => ' ',
            'slug'              => 'Slug',
            'slug_helper'       => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated At',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted At',
            'deleted_at_helper' => ' ',
        ],
    ],
    'contentPage' => [
        'title'          => 'Pages',
        'title_singular' => 'Page',
        'fields'         => [
            'id'                    => 'ID',
            'id_helper'             => ' ',
            'title'                 => 'Title',
            'title_helper'          => ' ',
            'category'              => 'Categories',
            'category_helper'       => ' ',
            'tag'                   => 'Tags',
            'tag_helper'            => ' ',
            'page_text'             => 'Full Text',
            'page_text_helper'      => ' ',
            'excerpt'               => 'Excerpt',
            'excerpt_helper'        => ' ',
            'featured_image'        => 'Featured Image',
            'featured_image_helper' => ' ',
            'created_at'            => 'Created at',
            'created_at_helper'     => ' ',
            'updated_at'            => 'Updated At',
            'updated_at_helper'     => ' ',
            'deleted_at'            => 'Deleted At',
            'deleted_at_helper'     => ' ',
        ],
    ],
    'faqManagement' => [
        'title'          => 'FAQ Management',
        'title_singular' => 'FAQ Management',
    ],
    'faqCategory' => [
        'title'          => 'Categories',
        'title_singular' => 'Category',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'category'          => 'Category',
            'category_helper'   => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated At',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted At',
            'deleted_at_helper' => ' ',
        ],
    ],
    'faqQuestion' => [
        'title'          => 'Questions',
        'title_singular' => 'Question',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'category'          => 'Category',
            'category_helper'   => ' ',
            'question'          => 'Question',
            'question_helper'   => ' ',
            'answer'            => 'Answer',
            'answer_helper'     => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated At',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted At',
            'deleted_at_helper' => ' ',
        ],
    ],
];
