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
            'title'        => 'Kế toán DPT: https://www.ketoandpt.com', // set false to total remove
            'titleBefore'  => false, // Put defaults.title before page title, like 'It's Over 9000! - Dashboard'
            'description'  => 'Khám phá Rừng Dừa Bảy Mẫu Hội An với giá vé rẻ nhất của chúng tôi...', // set false to total remove
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
            'title'       => 'Khám phá Rừng Dừa Bảy Mẫu Hội An với giá vé rẻ nhất của chúng tôi...', // set false to total remove
            'description' => 'Khám phá Rừng Dừa Bảy Mẫu Hội An với giá vé rẻ nhất của chúng tôi...', // set false to total remove
            'url'         => null, // Set null for using Url::current(), set false to total remove
            'type'        => 'news',
            'site_name'   => 'Trung tâm đào tạo kế toán DPT',
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
            'site'        => 'Khám phá Rừng Dừa Bảy Mẫu Hội An với giá vé rẻ nhất của chúng tôi...',
        ],
    ],
    'json-ld' => [
        /*
         * The default configurations to be used by the json-ld generator.
         */
        'defaults' => [
            'title'       => 'Khám phá Rừng Dừa Bảy Mẫu Hội An với giá vé rẻ nhất của chúng tôi...', // set false to total remove
            'description' => 'Khám phá Rừng Dừa Bảy Mẫu Hội An với giá vé rẻ nhất của chúng tôi...', // set false to total remove
            'url'         => null, // Set to null or 'full' to use Url::full(), set to 'current' to use Url::current(), set false to total remove
            'type'        => 'news',
            'images'      => [],
        ],
    ],
];
