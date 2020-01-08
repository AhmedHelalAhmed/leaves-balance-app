<?php

namespace App\Events;

use App\Leave;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use DateTime;
class LeaveCreated
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $leave;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Leave $leave)
    {
        $this->leave = $leave;

    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }

    public function getLeave()
    {
        return $this->leave;
    }

    public function getDays()
    {
        $from = $this->leave->from_date;
        $to = $this->leave->to_date;
        $datetime_from = new DateTime($from);
        $datetime_to = new DateTime($to);
        $interval = $datetime_from->diff($datetime_to);
        return $interval->format('%a');
    }


}
