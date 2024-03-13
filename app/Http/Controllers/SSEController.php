<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\StreamedResponse;

class SSEController extends Controller
{
    public function index(): StreamedResponse
    {
        return response()->stream(
            function () {
                $counter = 0;
                while (true) {
                    try {
                        echo "data: Log " . ++$counter . "\n\n";
                        // Отправляем данные на клиент
                        if (function_exists('fastcgi_finish_request')) {
                            // Завершаем текущий запрос, чтобы данные были отправлены независимо от дальнейшей обработки
                            fastcgi_finish_request();
                        } else {
                            // Для серверов без fastcgi_finish_request
                            ob_flush();
                            flush();
                        }
                        // "Ждем" 1 секунду перед отправкой следующего сообщения
                        sleep(1);
                    } catch (\Throwable $e) {
                        // Если произошло исключение, отправляем сообщение об ошибке
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
    }
}

