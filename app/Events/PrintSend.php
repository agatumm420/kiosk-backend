<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use App\Models\Display;

class PrintSend implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public $display;
    public $file;
    public $data;
    public function __construct(Display $display)
    {
        $this->display= $display;
        $this->file=$display->print_files()->where('printed',false)->first()->get();
        //dd($this->file);
        $this->data=[
            'display_id'=>$this->display->id,
            'file_name'=>$this->file[0]->file,
            'html'=>$this->file[0]->html,


        ];


    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
        public function broadcastAs(){
        return 'print.send';
    }
     public function brodcastWith(){
        $file= $this->display->print_files()->where('printed', false)->get();
        return response()->json([
            'data'=>[
                'file_name'=>$file->name,
                'html'=>$file->html,
            ]
        ]);

     }
    public function broadcastOn()
    {
        return new Channel($this->display->channel);
    }
}
