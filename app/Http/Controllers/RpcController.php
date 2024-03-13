<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RpcController extends Controller
{
    public function handleRpc(Request $request)
    {
        $data = $request->json()->all();
        $method = $data['method'];
        $params = $data['params'];

        // Пример удаленной процедуры
        if ($method === 'exampleRpcMethod') {
            $result = $this->exampleRpcMethod($params);
            return response()->json(['result' => $result]);
        }

        return response()->json(['error' => 'Method not found'], 404);
    }

    private function exampleRpcMethod($params)
    {
        // Ваш код удаленной процедуры
        return 'Вызвана удаленная процедура с параметрами: ' . json_encode($params);
    }
}
