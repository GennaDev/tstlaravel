<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SSEController extends Controller
{
    public function index()
    {
        // Отправляем заголовки для SSE
        $response = response()->stream(
            function () {
                $counter = 0;
                while (true) {
                    try {
                        $message = 'Log ' . ++$counter;
                        echo "data: $message\n\n";
                        if (ob_get_length()) {
                            ob_flush();
                            flush();
                        }
                        sleep(1);
                    } catch (\Throwable $e) {
                        // Обработка исключений
                        echo "data: Exception occurred: " . $e->getMessage() . "\n\n";
                        if (ob_get_length()) {
                            ob_flush();
                            flush();
                        }
                    }
                }
            },
            200,
            [
                'Content-Type' => 'text/event-stream',
                'Cache-Control' => 'no-cache',
                'Connection' => 'keep-alive',
            ]
        );

        return $response;
    }
}

