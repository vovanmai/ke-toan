<?php
/**
 * @see https://github.com/artesaos/seotools
 */

return [
    'meta' => [
        /*
         * The default configurations to be used by the meta generator.
         */
        'defaults'       => [
            'title'        => 'Đào tạo kế toán - Đại lý thuế DPT - Công ty cổ phần tổng hợp DPT - https://www.ketoandpt.com', // set false to total remove
            'titleBefore'  => false, // Put defaults.title before page title, like 'It's Over 9000! - Dashboard'
            'description'  => 'Đào tạo kế toán - Đại lý thuế DPT - Công ty cổ phần tổng hợp DPT - https://www.ketoandpt.com', // set false to total remove
            'separator'    => ' - ',
            'keywords'     => [],
            'canonical'    => false, // Set to null or 'full' to use Url::full(), set to 'current' to use Url::current(), set false to total remove
            'robots'       => 'index, follow', // Set to 'all', 'none' or any combination of index/noindex and follow/nofollow,
        ],
        /*
         * Webmaster tags are always added.
         */
        'webmaster_tags' => [
            'google'    => null,
            'bing'      => null,
            'alexa'     => null,
            'pinterest' => null,
            'yandex'    => null,
            'norton'    => null,
        ],

        'add_notranslate_class' => false,
    ],
    'opengraph' => [
        /*
         * The default configurations to be used by the opengraph generator.
         */
        'defaults' => [
            'title'       => 'Đào tạo kế toán - Đại lý thuế DPT - Công ty cổ phần tổng hợp DPT - https://www.ketoandpt.com', // set false to total remove
            'description' => 'Đào tạo kế toán - Đại lý thuế DPT - Công ty cổ phần tổng hợp DPT - https://www.ketoandpt.com', // set false to total remove
            'url'         => null, // Set null for using Url::current(), set false to total remove
            'type'        => '',
            'site_name'   => 'Đào tạo kế toán - Đại lý thuế DPT - Công ty cổ phần tổng hợp DPT - https://www.ketoandpt.com',
            'images'      => [],
            'locale' => 'vi_VN',
        ],
    ],
    'twitter' => [
        /*
         * The default values to be used by the twitter cards generator.
         */
        'defaults' => [
            'card'        => 'summary',
            'site'        => 'Đào tạo kế toán - Đại lý thuế DPT - Công ty cổ phần tổng hợp DPT - https://www.ketoandpt.com',
        ],
    ],
    'json-ld' => [
        /*
         * The default configurations to be used by the json-ld generator.
         */
        'defaults' => [
            'title'       => 'Đào tạo kế toán - Đại lý thuế DPT - Công ty cổ phần tổng hợp DPT - https://www.ketoandpt.com', // set false to total remove
            'description' => 'Đào tạo kế toán - Đại lý thuế DPT - Công ty cổ phần tổng hợp DPT - https://www.ketoandpt.com', // set false to total remove
            'url'         => null, // Set to null or 'full' to use Url::full(), set to 'current' to use Url::current(), set false to total remove
            'type'        => '',
            'images'      => [],
        ],
    ],
];
