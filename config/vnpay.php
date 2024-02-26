<?php

return [
    'vnp_TmnCode' => env('VNP_TMN_CODE', 'A87M6YLS'),
    'vnp_HashSecret' => env('VNP_HASH_SECRET', 'QMQLLIWPTVEAIXKJJQAQRCNUEMWDQQTY'),
    'vnp_Url' => 'https://sandbox.vnpayment.vn/paymentv2/vpcpay.html',
    'vnp_Returnurl' => env('APP_URL') . '/not-found',
    'vnp_OrderType' => 'billpayment',
    'vnp_Locale' => 'vn',
    'vnp_Version' => '2.1.0',
    'vnp_Command' => 'pay',
    'vnp_CurrCode' => 'VND',
//    'vnp_IpAddr' => request()->ip(),
];
