<?php

namespace App\Repository\Eloquent;

use App\Repository\CompanyRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Http;
use Psy\Util\Json;

class CompanyRepository extends BaseRepository implements CompanyRepositoryInterface
{

    public function __construct()
    {
        parent::__construct();
    }


    public function create(string $token, string $url, $request): JsonResponse
    {
        $response = Http::acceptJson()->withToken($token)
            ->post('https://'.$url.'/api/v4/companies', [
                'name' => [$request['name']],
                'price' => [$request['price']],
            ]);
        if($response->failed()){
            return response()->json(['server error'], 500);
        }
        $data = $response->json()["_embedded"]["companies"];
        return response()->json($data,200);
    }
}
