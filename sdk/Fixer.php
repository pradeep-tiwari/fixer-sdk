<?php

namespace sdk;

class Fixer {
    
    /**
     * @param  string|closure  $input  The base currency in string or as a closure.
     *
     * @return  Returns  latest foreign exchange reference rates in JSON format.
     */
    public function latest($input) {
        
    }
    
    /**
     * @param  Date  $date  An object representing the historical date.
     *
     * @return  Returns the exchanges rates based on a historical date.
     */
    public function historicalRates(Date $date) {
        
    }
    
    /**
     * @param  string  $baseCurrency  The base currency symbol.
     * @param  string  $exchangeCurrency The currency symbol to exchange to.
     *
     * @return  Returns the exchanged currency rates.
     */
    public function symbolicRates(string $baseCurrency, string $exchangeCurrency) {
        
    }
    
}