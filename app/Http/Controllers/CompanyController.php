<?php

namespace App\Http\Controllers;

use App\Repository\CompanyRepositoryInterface;
use Illuminate\Http\Request;


class CompanyController extends Controller
{
    private $companyRepository;

    public function __construct(CompanyRepositoryInterface $companyRepository)
    {
        $this->companyRepository = $companyRepository;
    }

    public function create(Request $request): array
    {
        $response = $this->companyRepository->getToken();
        $token = $response['access_token'];
        $url = $response['base_domain'];
        $obj = $this->companyRepository->create($token, $url, $request);
        return $obj["_embedded"]["companies"];
    }
}
