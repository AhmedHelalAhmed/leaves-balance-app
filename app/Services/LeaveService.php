<?php

namespace App\Services;

use App\Contracts\LeaveCrud;
use App\Leave;
use Flobbos\Crudable;

class LeaveService implements LeaveCrud {

    use Crudable\Crudable;

    public function __construct(Leave $leave) {
        $this->model = $leave;
    }

    public function getLeavesOfUsersOfTheBoss($boss)
    {
        return $boss->bossLeaves;
    }
}
