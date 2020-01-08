<?php

namespace App\Contracts;

use Flobbos\Crudable\Contracts\Crud;

interface LeaveCrud extends Crud{
    public function getLeavesOfUsersOfTheBoss($boss);
}

