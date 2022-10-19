<?php
 namespace App;

use Ratchet\ConnectionInterface;
use Ratchet\RFC6455\Messaging\MessageInterface;
use Ratchet\WebSocket\MessageComponentInterface;
use App\Models\Display;
use App\Mail\DisplayDown;
use BeyondCode\LaravelWebSockets\Contracts\ChannelManager;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\HttpFoundation\Session\Session;
use Ratchet\AbstractConnectionDecorator;
use BeyondCode\LaravelWebSockets\Server\Logger\ConnectionLogger;
use React\Promise\Deferred;
use React\Promise\PromiseInterface;





class CustomWebSocketHandler implements MessageComponentInterface
{
    protected $clients;
    public function __construct() {
        $this->clients = new \SplObjectStorage;
    }

    public function onOpen(ConnectionInterface $connection)
    {


        // $display=Display::where('socketId', $connection->resourceId)->get();

        // $display[0]->online=true;
        // $display[0]->save();
        //$conn=ConnectionLogger::getConnection();


        ///$this->verifyAppKey($connection).then(function () use ($connection) {dd($connection);});
        $verify=$this->verifyByChannel($connection);
        if($verify==false){
            $connection->close();
        }
        else{
            $this->generateSocketId($connection)
            ->establishConnection($connection);
            $display=$this->getDisplayChannel($connection);

            $display->online=true;
            $display->save();
            // dd($this->clients->current()->conn->controller->socketId);
            //dd($connection->app->id);
            $this->clients->attach($connection);
            //ConnectionLogger::setConnection($connection);
            //dd($connection->socketId);
           // dd($this->clients->current()->listeners);
            // TODO: Implement onOpen() method.
        }

    }

    public function onClose(ConnectionInterface $connection)
    {
        //sdd("hello");
        $display=$this->getDisplayChannel($connection);
        $display->online=false;
        $display->save();
        // $display=Display::where('socketId', $connection->socketId)->get();
        // $display[0]->online=false;
        // $display[0]->save();
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
        //dd($msg);


    }
    protected function generateSocketId(ConnectionInterface $connection)
    {
        $socketId = sprintf('%d.%d', random_int(1, 1000000000), random_int(1, 1000000000));

        $connection->socketId = $socketId;

        return $this;
    }
    protected function establishConnection(ConnectionInterface $connection)
    {
        $connection->send(json_encode([
            'event' => 'pusher:connection_established',
            'data' => json_encode([
                'socket_id' => $connection->socketId,
                'activity_timeout' => 30,
            ]),
        ]));

        return $this;
    }
    protected function verifyAppKey(ConnectionInterface $connection): PromiseInterface
    {
        $deferred = new Deferred();

        $query = QueryParameters::create($connection->httpRequest);

        $appKey = $query->get('appKey');

        App::findByKey($appKey)
            ->then(function ($app) use ($appKey, $connection, $deferred) {
                if (! $app) {
                    $deferred->reject(new Exceptions\UnknownAppKey($appKey));
                }

                $connection->app = $app;

                $deferred->resolve();
            });

        return $deferred->promise();
    }
    protected function verifyByChannel(ConnectionInterface $connection){
        $deferred = new Deferred();

        $query = QueryParameters::create($connection->httpRequest);

        $channel = $query->get('channel');

        $display=Display::where('channel', $channel)->first();
        if($display===null){
            return false;
        }
        else{
            return true;
        }


    }

    protected function getDisplayChannel(ConnectionInterface $connection)
    {
        $deferred = new Deferred();

        $query = QueryParameters::create($connection->httpRequest);

        $channel = $query->get('channel');
        $display=Display::where('channel', $channel)->get();



        return $display[0];
    }
}
