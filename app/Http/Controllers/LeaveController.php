<?php

namespace App\Http\Controllers;

use App\Contracts\LeaveRepositoryInterface;
use App\Http\Requests\StoreLeaveRequest;
use App\Leave;
use App\User;
use Exception;

class LeaveController extends Controller
{

    /**
     * @var LeaveRepositoryInterface
     */
    private $leaveRepository;

    public function __construct(LeaveRepositoryInterface $leaveRepository)
    {
        $this->leaveRepository = $leaveRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * TODO return view with the data
     */
    public function index(User $boss)
    {
        $leavesOfUsers=$this->leaveRepository->all($boss);
        return $leavesOfUsers;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     * @todo return view
     */
    public function create(User $user)
    {

        dd('return view ',$user);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param User $user
     * @param StoreLeaveRequest $request
     * @return \Illuminate\Http\RedirectResponse
     *
     */
    public function store(User $user,StoreLeaveRequest $request)
    {

        try{

            return redirect()->route('bosses.users.leaves.show',
                [
                    $user->boss()->id,
                    $user->id,
                    $this->leaveRepository->create($request->validated())->id
                ])->withMessage(trans('crud.record_created'));

        } catch (Exception $ex) {
            return redirect()->back()->withErrors($ex->getMessage())->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Leave  $leave
     * @return \Illuminate\Http\Response
     */
    public function show(User $boss,User $user,Leave $leaf)
    {
        return $leaf;
    }
}
