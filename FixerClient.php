<?php

namespace FixerClient;

require_once './sdk/Fixer.php';

use sdk\Fixer\Fixer as Fixer;

class FixerClient {
    
    public function __construct() {
        $this->fixer = new Fixer();
    }
    
}
