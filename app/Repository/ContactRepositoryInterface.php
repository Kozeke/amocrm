<?php
namespace App\Repository;


use Illuminate\Http\JsonResponse;

interface ContactRepositoryInterface
{
    /**
     * @param string $token
     * @param string $url
     * @param $request
     * @return array
     */
    public function create(string $token, string $url, $request): JsonResponse;
}
