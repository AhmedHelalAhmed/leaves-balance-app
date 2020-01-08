<?php


namespace App\Contracts;


interface LeaveRepositoryInterface
{
    public function all($boss);
    public function create($data);
    public function update($leaf,$data);

}
