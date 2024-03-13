<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class WebhookController extends Controller
{
    public function handleWebhook(Request $request)
    {
        // Получаем данные от Webhook
        $data = $request->getContent();

        // Распечатываем полученные данные
        Log::info('Webhook received: ' . $data);

        // Дополнительная логика обработки данных

        // Отправляем ответ серверу
        return response()->json(['message' => 'Webhook received'], 200);
    }
}

