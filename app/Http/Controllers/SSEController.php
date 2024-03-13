<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\StreamedResponse;

class SSEController extends Controller
{
    public function index()
    {
        $response = new StreamedResponse(function () {
            $counter = 0;
            while (true) {
                echo "data: Log " . ++$counter . "\n\n";
                ob_flush();
                flush();
                sleep(1);
            }
        });

        $response->headers->set('Content-Type', 'text/event-stream');
        $response->headers->set('Cache-Control', 'no-cache');
        $response->headers->set('Connection', 'keep-alive');

        return $response;
    }
}
