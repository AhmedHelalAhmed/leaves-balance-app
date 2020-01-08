<?php

namespace App\Services;

use App\Leave;
use Flobbos\Crudable\Contracts\Crud;
use Flobbos\Crudable;

class LeaveService implements Crud {
    
    use Crudable\Crudable;
    
    public function __construct(Leave $leave) {
        $this->model = $leave;
    }
    
}