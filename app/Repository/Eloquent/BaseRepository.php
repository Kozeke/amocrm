<?php

namespace App\Repository\Eloquent;

use App\Repository\EloquentRepositoryInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;

class BaseRepository implements EloquentRepositoryInterface
{
    /**
     * @var Model
     */


    public function __construct()
    {

    }


    public function getToken(): array
    {
        $response = Http::acceptJson()->withHeaders([
            'X-Client-Id' => '29669371'
        ])->get('https://test.gnzs.ru/oauth/get-token.php');
        return $response->json();
    }
}
