<?php

namespace App\Services;

use App\Services\CurrencyConversionService;
use App\Services\CurrencyFormatService;
use App\Resources\CurrencyResource;

class CurrencyAdditionService
{
    public function __construct(
        private CurrencyConversionService $currencyConversionService,
        private CurrencyFormatService $currencyFormatService,
        private CurrencyResource $currencyResource
    ) {}
    
    public function getFormatTotal(
        string $currencyOne,
        float $amountOne,
        string $currencyTwo,
        float $amountTwo,
    ): string
    {
        $totalAmount = $this->getTotal(
            $currencyOne,
            $amountOne,
            $currencyTwo,
            $amountTwo,
        );
        
        $totalCurrencyResource = $this->currencyResource
            ->setAmount($totalAmount)
            ->setCurrency($currencyOne);
        
        $formattedAmount = $this->currencyFormatService
            ->getFormattedValue($totalCurrencyResource);
        
        return $formattedAmount;
    }
    
    public function getTotal(
        string $currencyOne,
        float $amountOne,
        string $currencyTwo,
        float $amountTwo,
    ): float
    {
        $amountTwoConverted = $this->currencyConversionService
            ->getConvertedAmount($currencyOne, $currencyTwo, $amountTwo);
        
        // http://127.0.0.1:8000/api/gbp/2000/eur/3000
        // 3000 * 1.22 / 1.06
        // echo '<pre style="background:#111; color:#b5ce28; font-size:11px;">'; print_r($amountOne); echo '</pre>';
        // echo '<pre style="background:#111; color:#b5ce28; font-size:11px;">'; print_r($amountTwoConverted); echo '</pre>'; die();
        
        return round($amountOne + $amountTwoConverted, 2);
    }
}