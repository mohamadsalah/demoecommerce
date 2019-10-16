<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class test implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

 public $message;
 public $productId;
 public $userid;



  public function __construct($request ,$userid)
  {
      $this->message = $request->input('report');
      $this->productId = $request->productId;
      $this->userid = $userid;


  }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {

        return new PrivateChannel('user.'.$this->userid);

    }
    public function brodcastAs(){
        return 'test';
    }

}
