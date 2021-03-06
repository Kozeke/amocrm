<?php

namespace App\Http\Controllers;

use App\Repository\ContractRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;


class ContractController extends Controller
{
    private $contractRepository;

    public function __construct(ContractRepositoryInterface $contractRepository)
    {
        $this->contractRepository = $contractRepository;
    }

    public function create(Request $request): JsonResponse
    {
        $response = $this->contractRepository->getToken();
        $token = $response['access_token'];
        $url = $response['base_domain'];
        return $this->contractRepository->create($token, $url, $request);
    }
}
