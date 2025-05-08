<?php

namespace App\Http\Controllers;

use App\Services\CurrencyConverterService;
use Illuminate\Http\Request;

class CurrencyConverterController extends Controller
{
    protected $currencyConverterService;

    public function __construct(CurrencyConverterService $currencyConverterService)
    {
        $this->currencyConverterService = $currencyConverterService;
    }

    public function show()
    {
        return view('currency-converter');
    }

    public function convert(Request $request)
    {
        $validated = $request->validate([
            'from_currency' => 'required|string',
            'to_currency' => 'required|string',
            'amount' => 'required|numeric',
        ]);

        $convertedAmount = $this->currencyConverterService->convertCurrency(
            $validated['from_currency'],
            $validated['to_currency'],
            $validated['amount']
        );

        return response()->json(['converted_amount' => $convertedAmount]);
    }
}
