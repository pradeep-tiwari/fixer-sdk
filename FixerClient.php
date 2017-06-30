<?php

namespace FixerClient;

/**
 * Instead of manual rquires, we can implement autoloader or use
 * composer as namespaced autoloader.
 */
/*require_once './sdk/Fixer.php';
require_once './sdk/.php';*/


use sdk\Fixer;
use sdk\CurlClient;
use sdk\currency\Currency;
use sdk\exceptions\BadParameterException;

class FixerClient {
    
    private $_fixer;
    private $_curlClient;
    
    public function __construct($url = '') {
        $this->_fixer = new Fixer();
        $this->_curlClient = new CurlClient($url);
    }
    
    public function latest($input) {
        
        if(!is_string($input) || ($input instanceof Closure)) {
            throw new BadParameterException('Please provide a string or a closure.');
        }
        
        return json_decode($this->_fixer->latest($input));
        
    }
    
    public function historicalRates(string $date = '') {
        if(empty(trim($date))) {
            throw new BadParameterException('Please provide a valid date.');
        }
        
        return json_decode($this->_fixer->historicalRates($date));
    }
    
    /**
     * NOTE: Rather than making exception messages here, we can implement
     * it in the Currency class itself.
     */
    public function symbolicRates(string $base, string $target) {
        if(!Currency::isValidSymbol($base)) {
            $msg = 'Base currency symbol is invalid: %s';
            throw new UnsupportedCurrencySymbolException(sprintf($msg, $base));
        }
        
        if(!Currency::isValidSymbol($target)) {
            $msg = 'Target currency symbol is invalid: %s';
            throw new UnsupportedCurrencySymbolException(sprintf($msg, $target));
        }
        
        return json_decode($this->_fixer->symbolicRates($base, $target));
    }
    
}
