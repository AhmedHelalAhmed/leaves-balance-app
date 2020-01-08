@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-sm-6">
                                <h5>List Of Leaves</h5>
                            </div>
                            <div class="col-sm-6 text-right">
                                <a href="#" class="btn btn-light btn-sm">

                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        @include('crudable::notifications')
                        @if($leaves->isEmpty())
                            @lang('crud.no_entries')
                        @else
                            <table class="table table-striped table-hover">
                                <thead>
                                <tr>
                                    <th scope="col">Employee</th>
                                    <th scope="col">From</th>
                                    <th scope="col">To</th>
                                    <th scope="col">Type</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Reason</th>
                                    <th scope="col">Boss</th>
                                    <th scope="col">Action</th>

                                </tr>
                                </thead>
                                <tbody>
                                @foreach($leaves as $leave)
                                    <tr>
                                        <td>
                                            {{$leave->user->name}}
                                        </td>

                                        <td>
                                            {{$leave->from_date}}
                                        </td>

                                        <td>
                                            {{$leave->to_date}}
                                        </td>

                                        <td>
                                            {{$leave->getType() }}
                                        </td>

                                        <td>
                                            {{ is_null($leave->status)? 'N/A':$leave->getStatus() }}
                                        </td>

                                        <td>
                                            {{$leave->reason}}
                                        </td>

                                        <td>
                                            {{$leave->boss->name}}
                                        </td>

                                        <td>
                                            <a class="btn btn-sm btn-info " href="{{
                                                route('bosses.users.leaves.show',[$leave->boss->id,$leave->user->id,$leave->id])
                                                }}">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                        </td>

                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
