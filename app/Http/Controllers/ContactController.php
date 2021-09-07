<?php

namespace App\Http\Controllers;

use App\Repository\ContactRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;


class ContactController extends Controller
{
    private $contactRepository;

    public function __construct(ContactRepositoryInterface $contactRepository)
    {
        $this->contactRepository = $contactRepository;
    }

    public function create(Request $request): JsonResponse
    {
        $response = $this->contactRepository->getToken();
        $token = $response['access_token'];
        $url = $response['base_domain'];
        return $this->contactRepository->create($token, $url, $request);
    }
}
