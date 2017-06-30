<?php

namespace FixerClient;

require_once './sdk/Fixer.php';
require_once './sdk/.php';

use sdk\Fixer\Fixer as Fixer;
use sdk\CurlClient as CurlClient;
use sdk\exceptions\BadParameterException;

class FixerClient {
    
    private $_curlClient;
    
    public function __construct($url = '') {
        $this->fixer = new Fixer();
        $this->_curlClient = new CurlClient($url);
    }
    
    public function latest($input) {
        
        if(!is_string($input) || !(input instanceof Closure)) {
            throw new BadParameterException('Please provide a string or a closure.');
        }
        
        return $fixer->latest($input);
        
    }
    
}
