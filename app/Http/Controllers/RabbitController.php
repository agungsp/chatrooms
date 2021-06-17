<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Bschmitt\Amqp\Facades\Amqp;
use App\Jobs\TestJob;

class RabbitController extends Controller
{
    public function publish()
    {
        TestJob::dispatch(
            'Hallo World.'
        );
    }

    public function consume()
    {
        Amqp::consume('test1', function ($message, $resolver) {

            var_dump($message->body);

            $resolver->acknowledge($message);

         });

    }
}
