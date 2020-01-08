@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-sm-6">
                                <h5>Leave details</h5>
                            </div>
                            <div class="col-sm-6 text-right">
                                <a href="#" class="btn btn-light btn-sm">

                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <tbody>
                            <tr>
                                <th scope="col">Employee Name</th>
                                <th scope="row">{{ $leaf->user->name }}</th>
                            </tr>
                            <tr>
                                <th scope="col">Leaves credit</th>
                                <th scope="row">{{ $leaf->user->balance_of_leaves }}</th>
                            </tr>
                            <tr>
                                <th scope="col">From</th>
                                <th scope="row">{{ $leaf->from_date }}</th>
                            </tr>
                            <tr>
                                <th scope="col">To</th>
                                <th scope="row">{{ $leaf->to_date }}</th>
                            </tr>

                            <tr>
                                <th scope="col">Type</th>
                                <th scope="row"> {{$leaf->getType() }}</th>
                            </tr>

                            <tr>
                                <th scope="col">Status</th>
                                <th scope="row">  {{ is_null($leaf->status)? 'N/A':$leaf->getStatus() }}</th>
                            </tr>

                            <tr>
                                <th scope="col">Reason</th>
                                <th scope="row">  {{ $leaf->reason }}</th>
                            </tr>
                            @if(is_null($leaf->status))
                            <tr>
                                <th scope="col">Actions</th>
                                <th scope="row">

                                    <div class="btn-group" role="group">
                                        <form method="post">
                                            @csrf
                                            @method('put')
                                            <input type="hidden" name="status" value="1">
                                        <button class="btn btn-sm btn-success"  type="submit">
                                            <i class="fas fa-check-circle"></i>
                                        </button>
                                        </form>
                                        <form method="post">
                                            @csrf
                                            @method('put')
                                            <input type="hidden" name="status" value="0">
                                            <button class="btn btn-sm btn-danger" type="submit">
                                            <i class="fas fa-times-circle"></i>
                                        </button>
                                        </form>
                                    </div>
                                </th>
                            </tr>
                                @endif
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
