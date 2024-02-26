<?php

namespace App\Services\User\User3\Document;

use App\Data\Repositories\Eloquent\DocumentRepository;
use Carbon\Carbon;

class PaymentService
{
    /**
     * @var DocumentRepository
     */
    protected $repository;

    public function __construct(DocumentRepository $repository) {
        $this->repository = $repository;
    }

    /**
     * @return array
     */
    public function handle ($id)
    {
        $document = $this->repository->find($id);

        $configVnPay = config('vnpay');


        $vnp_OrderInfo = "Thanh toán hóa đơn phí dich vụ";
        $vnp_BankCode = 'VNPAYQR';

        $inputData = array(
            "vnp_Version" => $configVnPay['vnp_Version'],
            "vnp_TmnCode" => $configVnPay['vnp_TmnCode'],
            "vnp_Amount" => $document->price * 100,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => $configVnPay['vnp_CurrCode'],
            "vnp_IpAddr" => $configVnPay['vnp_IpAddr'],
            "vnp_Locale" => $configVnPay['vnp_Locale'],
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => $configVnPay['vnp_OrderType'],
            "vnp_ReturnUrl" => $configVnPay['vnp_Returnurl'],
            "vnp_TxnRef" => $document->id,
        );

        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }

        ksort($inputData);
        $query = "";

        $hashData = "";

        foreach ($inputData as $key => $value) {
            $hashData .= urlencode($key) . "=" . urlencode($value) . '&';
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }

        $hashData = rtrim($hashData, '&');

        $vnp_Url = $configVnPay['vnp_Url'] . "?" . $query;

        $vnpSecureHash = hash_hmac('sha512', $hashData, $configVnPay['vnp_HashSecret']);
        $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;

        return redirect($vnp_Url);
    }
}
