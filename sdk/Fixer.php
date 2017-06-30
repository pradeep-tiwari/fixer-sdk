<?php

namespace sdk;

use sdk\CurlClient;

class Fixer {
    
    private $_client;
    private $_baseUrl = 'http://api.fixer.io';
    
    public function __construct() {
        $this->_client = new CurlClient();
    }
    
    /**
     * @param  string|closure  $input  The base currency in string or as a closure.
     *
     * @return  Returns  latest foreign exchange reference rates in JSON format.
     */
    public function latest($input) {
        $url = $this->_baseUrl . '/latest';
        return $this->_client->request($url);
    }
    
    /**
     * @param  Date  $date  An object representing the historical date.
     *
     * @return  Returns the exchanges rates based on a historical date.
     */
    public function historicalRates($date) {
        $url = $this->_baseUrl . '/' . $date;
        return $this->_client->request($url);
    }
    
    /**
     * @param  string  $baseCurrency  The base currency symbol.
     * @param  string  $exchangeCurrency The currency symbol to exchange to.
     *
     * @return  Returns the exchanged currency rates.
     */
    public function symbolicRates(string $baseCurrency, string $exchangeCurrency) {
        $url = $this->_baseUrl . '/latest?symbols=' . $baseCurrency . ',' . $exchangeCurrency;
        return $this->_client->request($url);
    }
    
}