<?php

namespace App\Http\Controllers;

use App\Services\CurrencyAdditionService;
use Illuminate\Http\Request;

class CurrencyController extends Controller
{
    public function __construct(private CurrencyAdditionService $currencyAdditionService) {}
    
    public function index(
        string $currencyOne,
        string $amountOne,
        string $currencyTwo,
        string $amountTwo,
        string $fmt=null,
    ): mixed
    {
        if ($fmt) {
            return $this->currencyAdditionService
                ->getFormatTotal(
                    $currencyOne,
                    $amountOne,
                    $currencyTwo,
                    $amountTwo,
                );
        }
        else {
            return $this->currencyAdditionService
                ->getTotal(
                    $currencyOne,
                    $amountOne,
                    $currencyTwo,
                    $amountTwo,
                );
        }
    }
}
