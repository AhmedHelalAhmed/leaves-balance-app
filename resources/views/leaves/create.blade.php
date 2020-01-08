@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">


                    <div class="card-header">
                        <h5>Request leave</h5>
                    </div>

                    <div class="card-body">

                        @include('crudable::notifications')

                        <create-leave-component
                            :action="{{ json_encode(route('users.leaves.store',$user->id)) }}"
                            :csrf="{{ json_encode(csrf_token()) }}"

                        ></create-leave-component>

                    </div>


            </div>
        </div>

    </div>
</div>
@stop
