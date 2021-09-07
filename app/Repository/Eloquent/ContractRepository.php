<?php

namespace App\Repository\Eloquent;

use App\Repository\ContractRepositoryInterface;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Http;

class ContractRepository extends BaseRepository implements ContractRepositoryInterface
{


    public function __construct()
    {
        parent::__construct();
    }


    public function create(string $token, string $url, $request): array
    {
        $response = Http::acceptJson()->withToken($token)
            ->post('https://'.$url.'/api/v4/leads', [
                'name' => [$request['name']],
                'price' => [$request['price']],
            ]);
        return $response->json();
    }
}
