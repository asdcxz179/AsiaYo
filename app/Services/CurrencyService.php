<?php

namespace App\Services;

use Illuminate\Support\Carbon;

/**
 * Class CurrencyService.
 */
class CurrencyService
{
    protected $currencies;
    /** 
     * 建構子
     * @version 1.0
     * @author Henry
    **/
    public function __construct() {
        /* 取出預設轉換匯率 */
        $this->setCurrencies((json_decode(file_get_contents(storage_path('app/currency.json'))))->currencies);
    }

    /**
     * 設置轉換匯率
     * @param object $currencies
     * @version 1.0
     * @author Henry
     */
    public function setCurrencies($currencies) {
        $this->currencies = $currencies;
    }

    /**
     * 輸出資料整理
     * @param float $amount
     * @return stirng
     * @version 1.0
     * @author Henry
     */
    public function output($amount) {
        return "$".number_format($amount, strlen(substr(strrchr($amount, "."),1)));
    }

    /**
     * Amount 資料處理
     * @param string $amount
     * @return float
     * @version 1.0
     * @author Henry
     */
    public function amountHandle($amount) {
        $amount = preg_replace("/,|\\$/", "", $amount);
        return (float)$amount;
    }

    /**
     * 匯率轉換
     * @param string $source
     * @param string $target
     * @param string $amount
     * @return string
     * @version 1.0
     * @author Henry
     */
    public function trans($source, $target, $amount) {

        $currency = $this->currencies->{$source};
        $exchange = $currency->{$target};
        $amount = $this->amountHandle($amount);
        $exchangAmount = (float)bcmul($amount, $exchange, 4);
        return $this->output($exchangAmount);
    }
}