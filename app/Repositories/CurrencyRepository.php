<?php

namespace App\Repositories;

use App\Models\CurrencyModel;

class CurrencyRepository
{
    public function currencyExists(string $isoCode): bool
    {
        return CurrencyModel::where('iso_code', $isoCode)
            ->exists();
    }
    
    public function addCurrency(
        string $isoCode,
        string $symbol,
        string $decimalSeparator,
        string $thousandSeparator,
        bool   $symbolBefore,
        float  $dollarValue,
    ){
        CurrencyModel::create([
            'isoCode'             => $isoCode,
            'symbol'              => $symbol,
            'decimal_separator'   => $decimalSeparator,
            'thousands_separator' => $thousandsSeparator,
            'symbol_before'       => $symbolBefore,
            'dollar_value'        => $dollarValue,
        ]);
    }
    
    public function getCurrency(string $isoCode)
    {
        return CurrencyModel::where('iso_code', $isoCode)
            ->first();
    }
    
    public function getSymbol(string $isoCode)
    {
        return CurrencyModel::where('iso_code', $isoCode)
            ->value('symbol');
    }
    
    public function getDecimalSeparator(string $isoCode)
    {
        return CurrencyModel::where('iso_code', $isoCode)
            ->value('decimal_separator');
    }
    
    public function getThousandsSeparator(string $isoCode)
    {
        return CurrencyModel::where('iso_code', $isoCode)
            ->value('thousands_separator');
    }
    
    public function getSymbolBefore(string $isoCode)
    {
        return CurrencyModel::where('iso_code', $isoCode)
            ->value('symbol_before');
    }
    
    public function getDollarValue(string $isoCode)
    {
        return CurrencyModel::where('iso_code', $isoCode)
            ->value('dollar_value');
    }
}
