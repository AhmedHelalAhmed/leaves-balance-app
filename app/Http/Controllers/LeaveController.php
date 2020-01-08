<?php

namespace App\Http\Controllers;

use App\Contracts\LeaveRepositoryInterface;
use App\Http\Requests\StoreLeaveRequest;
use App\Http\Requests\UpdateLeaveRequest;
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
        $leavesOfUsers = $this->leaveRepository->all($boss);
        return view('leaves.index', ['leaves' => $leavesOfUsers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     * @todo return view
     */
    public function create(User $user)
    {
        return view('leaves.create', ['user' => $user]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param User $user
     * @param StoreLeaveRequest $request
     * @return \Illuminate\Http\RedirectResponse
     *
     */
    public function store(User $user, StoreLeaveRequest $request)
    {

        try {
            $this->leaveRepository->create(
                array_merge($request->validated(), [
                    'user_id' => $user->id,
                    'assigned_id' => $user->boss->id,
                ])
            );
            return redirect()->route('bosses.leaves.index',
                [
                    $user->boss->id,
                    $user->id
                ])->withMessage(trans('crud.record_created'));

        } catch (Exception $ex) {
            return redirect()->back()->withErrors($ex->getMessage())->withInput();
        }
    }

    /**
     * Display the specified resource.
     * @param User $boss
     * @param User $user
     * @param Leave $leaf
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(User $boss, User $user, Leave $leaf)
    {
        return view('leaves.show', ['leaf' => $leaf]);
    }

    public function update(User $boss, User $user, Leave $leaf, UpdateLeaveRequest $request)
    {
        try {
            $this->leaveRepository->update($leaf, $request->validated());
            return redirect()->route('bosses.leaves.index',
                [
                    $boss->id,
                ]
            )->withMessage(trans('crud.record_updated'));
        } catch (Exception $ex) {
            return redirect()->back()->withInput()->withErrors($ex->getMessage());
        }
    }
}
