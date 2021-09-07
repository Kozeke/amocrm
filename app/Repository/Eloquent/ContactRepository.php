<?php

namespace App\Repository\Eloquent;

use App\Repository\ContactRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Http;

class ContactRepository extends BaseRepository implements ContactRepositoryInterface
{

    public function __construct()
    {
        parent::__construct();
    }


    public function create(string $token, string $url, $request): JsonResponse
    {
        $response = Http::acceptJson()->withToken($token)
            ->post('https://'.$url.'/api/v4/contacts', [
                'name' => [$request['name']],
                'price' => [$request['price']],
            ]);
        if($response->failed()){
            return response()->json(['server error'], 500);
        }
        $data = $response->json()["_embedded"]["contacts"];
        return response()->json($data,200);
    }
}
