<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FatoorahController extends Controller
{
    private $fatoorahServices;
    public function __construct(FatoorahServices $fatoorahServices){
        $this->fatoorahServices = $fatoorahServices;
    }

    public function payOrder(){
        $user = Auth::user();
//        return $user;
        $data = [
            //Fill required data
            'NotificationOption' => 'Lnk', //'SMS', 'EML', or 'ALL'
            'InvoiceValue'       => '100',
            'CustomerName'       => $user->name,
            //Fill optional data
            'DisplayCurrencyIso' => 'KWD',
            //'MobileCountryCode'  => '+965',
            //'CustomerMobile'     => '1234567890',
            'CustomerEmail'      => $user->email,
            'CallBackUrl'        => env('success_url'),
            'ErrorUrl'           => env('error_url'), //or 'https://example.com/error.php'
            'Language'           => 'en', //or 'ar'
            //'CustomerReference'  => 'orderId',
            //'CustomerCivilId'    => 'CivilId',
            //'UserDefinedField'   => 'This could be string, number, or array',
            //'ExpiryDate'         => '', //The Invoice expires after 3 days by default. Use 'Y-m-d\TH:i:s' format in the 'Asia/Kuwait' time zone.
            //'SourceInfo'         => 'Pure PHP', //For example: (Laravel/Yii API Ver2.0 integration)
            //'CustomerAddress'    => $customerAddress,
            //'InvoiceItems'       => $invoiceItems,
        ];

    }
}
