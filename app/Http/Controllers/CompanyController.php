<?php

namespace App\Http\Controllers;

use App\Repository\CompanyRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;


class CompanyController extends Controller
{
    private $companyRepository;

    public function __construct(CompanyRepositoryInterface $companyRepository)
    {
        $this->companyRepository = $companyRepository;
    }

    public function create(Request $request): JsonResponse
    {
        $token_obj = $this->companyRepository->getToken();
        $token = $token_obj['access_token'];
        $url = $token_obj['base_domain'];
        return $this->companyRepository->create($token, $url, $request);

    }
}
