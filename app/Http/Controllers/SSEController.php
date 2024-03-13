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
                $counter = 1;
                while (true) {
                    try {
                        $message = 'Log ' . $counter;
                        echo "data: $message\n\n";
                        ob_flush();
                        flush();
                        $counter++;
                        sleep(1); // Задержка в 1 секунду
                    } catch (\Throwable $e) {
                        // Обработка исключений
                        echo "data: Exception occurred: " . $e->getMessage() . "\n\n";
                        ob_flush();
                        flush();
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
