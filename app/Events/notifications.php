<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use IlluminateQueueSerializesModels;
use IlluminateFoundationEventsDispatchable;
use IlluminateBroadcastingInteractsWithSockets;
use IlluminateContractsBroadcastingShouldBroadcast;

class notifications implements ShouldBroadcast
{
  use Dispatchable, InteractsWithSockets, SerializesModels;

  public $message;

  public $userid;



  public function __construct($message ,$userid)
  {
      $this->message = $message;
      $this->userid = $userid;

  }

  public function broadcastOn()
  {

    new PrivateChannel('my-channel'.$this->userid);

  }

  public function broadcastAs()
  {
      return 'my-test';

  }
}