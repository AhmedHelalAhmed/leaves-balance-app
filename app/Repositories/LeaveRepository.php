<?php


namespace App\Repositories;
use App\Contracts\LeaveCrud;
use App\Contracts\LeaveRepositoryInterface;
use App\Events\LeaveCreated;
use Flobbos\Crudable\Contracts\Crud;

class LeaveRepository implements LeaveRepositoryInterface
{


    /**
     * @var Crud
     */
    private $leave;

    public function __construct(LeaveCrud $leave)
    {
        $this->leave = $leave;
    }

    public function all($boss)
    {
        return $this->leave->getLeavesOfUsersOfTheBoss($boss);
    }

    public function create($data)
    {
        return $this->leave->create($data);
    }

    public function update($leaf,$data)
    {
       if($data['status'])
       {
           event(new LeaveCreated($leaf));
       }
        return $this->leave->update($leaf->id, $data);
    }

}
