<?php

namespace App\Models;

use Illuminate\Support\Facades\Http;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CurrencyConverter extends Model
{
    use HasFactory;
    protected $apiKey;

    public function __construct()
    {
        $this->apiKey = config('services.freecurrencyapi.api_key');
    }

    public function getExchangeRate($fromCurrency = null, $toCurrency = null)
    {
        $response = Http::get("https://api.freecurrencyapi.com/v1/latest?apikey=R15bQEP3FXUGz6FEVjqIlxyUgXzKh4UtzFTfbkUk&currencies=EUR%2CUSD%2CBGN");
        
        if ($response->successful()) {
            $data = $response->json();
            return $data['rates'];
        }
    
        return [];

    }
}
