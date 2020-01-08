<?php


namespace App\Repositories;
use App\Contracts\LeaveRepositoryInterface;
use Flobbos\Crudable\Contracts\Crud;

class LeaveRepository implements LeaveRepositoryInterface
{


    /**
     * @var Crud
     */
    private $leave;

    public function __construct(Crud $leave)
    {
        $this->leave = $leave;
    }

    //? this that ok to depend on the relation
    public function all($boss)
    {
//        dd($this->leave->bossLeaves());
        return $boss->bossLeaves;
    }
}
