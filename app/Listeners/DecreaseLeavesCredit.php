<?php

namespace App\Listeners;

use App\Events\LeaveCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class DecreaseLeavesCredit
{


    /**
     * Handle the event.
     *
     * @param LeaveCreated $event
     * @return void
     */
    public function handle(LeaveCreated $event)
    {
        $user = $event->getLeave()->user;
        $days = $event->getDays();

        $user->update([
            'balance_of_leaves' => $user->balance_of_leaves-$days
        ]);
    }
}
