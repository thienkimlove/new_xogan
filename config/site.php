<?php

return [
    'contact_status' => [
        0 => 'Vừa tiếp nhận',
        1 => 'Đang xử lý',
        2 => 'Đã hoàn thành'
    ],

    'sitemap' => ['categories', 'posts', 'questions', 'videos'],
    'content' => [

        'posts' => [
            'name' => 'Bài viết',
            'modules' => [
                'index_right' => 'Right Index',
                'normal_right' => 'Right Trang trong',
                'index_right_share' => 'Share Right Index',
                'display_index' => 'Show On Index'
            ]
        ],

        'categories' => [
            'name' => 'Chuyen muc',
            'modules' => [
                'index_block_1' => 'Block 1 Index',
                'index_block_2' => 'Block 2 Index',
                'index_block_3' => 'Block 3 Index'
            ]
        ],
        'videos' => [
            'name' => 'Video',
            'modules' => [
                'index_right' => 'Right Index',
            ]
        ],
        'questions' => [
            'name' => 'Question',
            'modules' => [
                'index_right' => 'Right Index',
            ]
        ],

        'contacts' => [
            'name' => 'Contacts',
            'modules' => [
                'index_right' => 'Right Index',
            ]
        ]


        //add more content here...
    ],
    'item_per_page' => 10
];