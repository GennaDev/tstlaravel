<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class SSEController extends Controller
{
    public function serveSSE()
    {
        // Set the appropriate headers for SSE
        header('Content-Type: text/event-stream');
        header('Cache-Control: no-cache');
        header('Connection: keep-alive');

        // Send a message every 5 seconds
        while (true) {
            // Create a message with current timestamp
            $message = "data: " . json_encode(['time' => date('Y-m-d H:i:s')]) . "\n\n";

            // Send the message
            echo $message;

            // Flush the output buffer
            ob_flush();
            flush();

            // Wait for 5 seconds
            sleep(5);
        }
    }
}
