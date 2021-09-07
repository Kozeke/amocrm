<?php

namespace App\Repository\Eloquent;

use App\Repository\ContactRepositoryInterface;
use Illuminate\Support\Facades\Http;

class ContactRepository extends BaseRepository implements ContactRepositoryInterface
{

    public function __construct()
    {
        parent::__construct();
    }


    public function create(string $token, string $url, $request): array
    {
        $response = Http::acceptJson()->withToken($token)
            ->post('https://'.$url.'/api/v4/contacts', [
                'name' => [$request['name']],
                'price' => [$request['price']],
            ]);
        return $response->json();
    }
}
