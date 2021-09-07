<?php

namespace App\Repository\Eloquent;

use App\Repository\CompanyRepositoryInterface;
use Illuminate\Support\Facades\Http;

class CompanyRepository extends BaseRepository implements CompanyRepositoryInterface
{

    public function __construct()
    {
        parent::__construct();
    }


    public function create(string $token, string $url, $request): array
    {
        $response = Http::acceptJson()->withToken($token)
            ->post('https://'.$url.'/api/v4/companies', [
                'name' => [$request['name']],
                'price' => [$request['price']],
            ]);
        return $response->json();
    }
}
