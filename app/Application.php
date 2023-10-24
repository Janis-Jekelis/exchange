<?php
declare(strict_types=1);
namespace App;
class Application
{
    private array $currencyToExchange;
    private string $targetCurrency;

    public function __construct()
    {
        echo "availabe currencies" . implode(", "((new Currencies)->getCurrencies()));
        $this->currencyToExchange=explode(" ",readline("please input amount and currency to exchange(ex. 100 USD)"));
        if (!(count($this->currencyToExchange)==2))exit("invalid input");
        if(!(is_numeric($this->currencyToExchange[0])))exit("invalid input");
        if(!(in_array($this->currencyToExchange[1],((new Currencies)->getCurrencies()))))exit("invalid input");
        $this->targetCurrency=readline("please input currency you wish to get");
        if(!(in_array($this->targetCurrency,((new Currencies)->getCurrencies()))))exit("invalid input");
       $this->currencyToExchange[1]=strtoupper($this->currencyToExchange[1]);
       $this->targetCurrency=strtoupper($this->targetCurrency);

    }
    public function calculate():float
    {
    $rates=(new Currencies)->getRates($this->currencyToExchange[1],$this->targetCurrency);
        return ($this->currencyToExchange[0]*100*$rates)/100;
    }

}
