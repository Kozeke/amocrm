<?php

namespace App\Repository\Eloquent;

use App\Repository\ContractRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Http;

class ContractRepository extends BaseRepository implements ContractRepositoryInterface
{


    public function __construct()
    {
        parent::__construct();
    }


    public function create(string $token, string $url, $request): JsonResponse
    {
        $response = Http::acceptJson()->withToken($token)
            ->post('https://'.$url.'/api/v4/leads', [
                'name' => [$request['name']],
                'price' => [$request['price']],
            ]);
        if($response->failed()){
            return response()->json(['server error'], 500);
        }
        $data = $response->json()["_embedded"]["leads"];
        return response()->json($data,200);
    }
}
