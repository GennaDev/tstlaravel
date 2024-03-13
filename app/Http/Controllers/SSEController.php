<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\StreamedResponse;

class SSEController extends Controller
{
    public function index(): StreamedResponse
    {
        $response = new StreamedResponse(function () {
            $counter = 0;
            while (true) {
                echo "data: Log " . ++$counter . "\n\n";
                // Отправляем данные на клиент
                ob_flush();
                flush();
                // "Ждем" 1 секунду перед отправкой следующего сообщения
                sleep(1);
            }
        });

        // Устанавливаем необходимые заголовки для SSE
        $response->headers->set('Content-Type', 'text/event-stream');
        $response->headers->set('Cache-Control', 'no-cache');
        $response->headers->set('Connection', 'keep-alive');

        return $response;
    }
}
