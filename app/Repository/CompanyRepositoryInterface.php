<?php
namespace App\Repository;

interface CompanyRepositoryInterface
{
    /**
     * @param string $token
     * @param string $url
     * @param $request
     * @return array
     */
    public function create(string $token, string $url, $request): array;
}
