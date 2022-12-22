<?php

namespace App\Services;

use App\Repositories\CurrencyRepository;
use App\Resources\CurrencyResource;

class CurrencyFormatService
{
    public function __construct(private CurrencyRepository $currencyRepository)
    {
    }
    
    public function getFormattedValue(CurrencyResource $currencyResource): string
    {
        $amount  = $currencyResource->getAmount();
        $isoCode = $currencyResource->getCurrency();
        
        $currencyData = $this->currencyRepository->getCurrency($isoCode);
        
        $formattedValue = number_format($amount, 2, $currencyData->decimal, $currencyData->thousands);
        
        return $currencyData->symbolBefore
            ? $currencyData->symbol . $formattedValue
            : $formattedValue . $currencyData->symbol;
    }
}