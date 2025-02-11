<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class DuoController extends Controller
{
    public function sendRequest(Request $request)
    {
        $integrationKey = env('DUO_INTEGRATION_KEY');
        $secretKey = env('DUO_SECRET_KEY');
        $apiHostname = env('DUO_API_HOSTNAME');
        $path = '/admin/v1/users';
        $method = 'GET';

        // Parâmetros da requisição
        $params = [
            'limit' => $request->input('limit', 100),
            'offset' => $request->input('offset', 0),
        ];

        // Ordenar parâmetros lexicograficamente e codificar
        ksort($params);
        $queryParams = http_build_query($params);

        // Data atual no formato RFC 2822
        $date = gmdate('D, d M Y H:i:s') . ' GMT';

        // String canonical
        $canonicalString = "{$date}\n{$method}\n{$apiHostname}\n{$path}\n{$queryParams}";
        // dd($canonicalString);
        // Geração da assinatura HMAC-SHA1
        $hmacSignature = hash_hmac('sha1', $canonicalString, $secretKey);
        $authString = "{$integrationKey}:{$hmacSignature}";
        $authHeader = "Basic " . base64_encode($authString);

        // dd("https://{$apiHostname}{$path}",$params);
        try {
            // Faça a requisição com Guzzle
            $response = Http::withHeaders([
                'Date' => $date,
                'Authorization' => $authHeader,
                'Content-Type' => 'application/x-ww>w-form-urlencoded',
            ])->withOptions(['verify' => false])->get("https://{$apiHostname}{$path}", $params);

                return response()->json([
                'http_code' => $response->status(),
                'response' => $response->json(),
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Request Error',
                'message' => $e->getMessage(),
            ], 500);
        }
    }


    public function createUser(Request $request)
    {
        $integrationKey = env('DUO_INTEGRATION_KEY');
        $secretKey = env('DUO_SECRET_KEY');
        $apiHostname = env('DUO_API_HOSTNAME');
        $path = '/admin/v1/users';
        $method = 'POST';

        // Parâmetros da requisição
        $params = [
            'username' => $request->input('username', 'cabo2cla')
        ];

        $date = gmdate('D, d M Y H:i:s') . ' GMT';

        // Ordenar os parâmetros lexicograficamente
        ksort($params);
        $queryParams = http_build_query($params);

        // String canonical
        $canonicalString = "{$date}\n{$method}\n{$apiHostname}\n{$path}\n{$queryParams}";

        // Geração da assinatura HMAC-SHA1
        $hmacSignature = hash_hmac('sha1', $canonicalString, $secretKey);
        $authString = "{$integrationKey}:{$hmacSignature}";
        $authHeader = "Basic " . base64_encode($authString);

        try {
            $response = Http::withHeaders([
                'Date' => $date,
                'Authorization' => $authHeader,
                'Content-Type' => 'application/x-www-form-urlencoded',
            ])->asForm()->withOptions(['verify' => false])->post("https://{$apiHostname}{$path}", $params);

                return response()->json([
                'http_code' => $response->status(),
                'response' => $response->json(),
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Request Error',
                'message' => $e->getMessage(),
            ], 500);
        }
    }

    public function deleteUser(Request $request)
{
    $integrationKey = env('DUO_INTEGRATION_KEY');
    $secretKey = env('DUO_SECRET_KEY');
    $apiHostname = env('DUO_API_HOSTNAME');
    $userId = $request->input('user_id'); // Aqui você pode enviar user_id como ?user_id=12345
    $path = "/admin/v1/users/{$userId}";
    $method = 'DELETE';


    if (!$userId) {
        return response()->json(['error' => 'user_id é necessário'], 400);
    }

    // Construir o caminho para o endpoint da API do Duo
    $path = "/admin/v1/users/{$userId}";

    // Data atual no formato RFC 2822 para o cabeçalho "Date"
    $date = gmdate('D, d M Y H:i:s') . ' GMT';

    // String canonical para a assinatura HMAC-SHA1
    $canonicalString = "{$date}\n{$method}\n{$apiHostname}\n{$path}\n";

    // Geração da assinatura HMAC-SHA1
    $hmacSignature = hash_hmac('sha1', $canonicalString, $secretKey);
    $authString = "{$integrationKey}:{$hmacSignature}";
    $authHeader = "Basic " . base64_encode($authString);

    // Fazendo a requisição DELETE para a API do Duo
    try {
        $response = Http::withHeaders([
            'Date' => $date,
            'Authorization' => $authHeader,
            'Content-Type' => 'application/x-www-form-urlencoded',
            ])->withOptions(['verify' => false])->delete("https://{$apiHostname}{$path}");

            // Verificar se a requisição foi bem-sucedida
        if ($response->successful()) {
            return response()->json([
                'status' => 'success',
                'message' => 'Usuário deletado com sucesso',
            ]);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'Falha ao deletar usuário',
                'error' => $response->json(),
            ], 500);
        }
    } catch (\Exception $e) {
        return response()->json([
            'error' => 'Request Error',
            'message' => $e->getMessage(),
        ], 500);
    }
}


public function updateUser(Request $request)
{
    $integrationKey = env('DUO_INTEGRATION_KEY');
    $secretKey = env('DUO_SECRET_KEY');
    $apiHostname = env('DUO_API_HOSTNAME');
    $userId = $request->input('user_id'); // ID do usuário a ser atualizado
    $path = "/admin/v1/users/{$userId}";
    $method = 'POST';

    if (!$userId) {
        return response()->json(['error' => 'user_id é necessário'], 400);
    }

    // Parâmetros de atualização
    $updatedData = $request->only([
        'username',
    ]);

    if (empty($updatedData)) {
        return response()->json(['error' => 'Dados de atualização não fornecidos'], 400);
    }

    // Ordenar os parâmetros lexicograficamente
    ksort($updatedData);
    $queryParams = http_build_query($updatedData);

    // Data atual no formato RFC 2822
    $date = gmdate('D, d M Y H:i:s') . ' GMT';

    // String canonical para a assinatura HMAC-SHA1
    $canonicalString = "{$date}\n{$method}\n{$apiHostname}\n{$path}\n{$queryParams}";

    // Geração da assinatura HMAC-SHA1
    $hmacSignature = hash_hmac('sha1', $canonicalString, $secretKey, false);
    $authString = "{$integrationKey}:{$hmacSignature}";
    $authHeader = "Basic " . base64_encode($authString);

    try {
        // Enviar a requisição POST com os dados a serem atualizados
        $response = Http::withHeaders([
            'Date' => $date,
            'Authorization' => $authHeader,
            'Content-Type' => 'application/x-www-form-urlencoded',
        ])->asForm()->post("https://{$apiHostname}{$path}", $updatedData);

        // Verificar se a requisição foi bem-sucedida
        if ($response->successful()) {
            return response()->json([
                'status' => 'success',
                'message' => 'Usuário atualizado com sucesso',
                'response' => $response->json(),
            ]);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'Falha ao atualizar o usuário',
                'error' => $response->json(),
            ], $response->status());
        }
    } catch (\Exception $e) {
        return response()->json([
            'error' => 'Request Error',
            'message' => $e->getMessage(),
        ], 500);
    }
}


}
