<?php
 namespace App;

use Ratchet\ConnectionInterface;
use Ratchet\RFC6455\Messaging\MessageInterface;
use Ratchet\WebSocket\MessageComponentInterface;
use App\Models\Display;
use App\Mail\DisplayDown;
use Illuminate\Support\Facades\Mail;


class CustomWebSocketHandler implements MessageComponentInterface
{
    protected $clients;
    public function __construct() {
        $this->clients = new \SplObjectStorage;
    }

    public function onOpen(ConnectionInterface $connection)
    {
        dump($connection->resourceId);
        $display=Display::where('socketId', $connection->resourceId)->get();
        $display->online=true;
        $display->save();

        $this->clients->attach($connection);
        // TODO: Implement onOpen() method.
    }

    public function onClose(ConnectionInterface $connection)
    {
        $display=Display::where('socketId', $connection->resourceId)->get();
        $display->online=false;
        $display->save();
        Mail::to('agnieszka@sofine.pl')->send(new DisplayDown($display));
        //$this->clients->attach($connection);
        // TODO: Implement onClose() method.
    }

    public function onError(ConnectionInterface $connection, \Exception $e)
    {
        // TODO: Implement onError() method.
    }

    public function onMessage(ConnectionInterface $connection, MessageInterface $msg)
    {
        if($msg->event=='pusher:connection_established'){
            $display=Display::where('socketId', $msg->socket_id)->get();
            $display[0]->online=true;
            $display[0]->save();
        }

    }
}
