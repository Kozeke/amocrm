<?php

namespace App\Http\Controllers;

use App\Repository\ContactRepositoryInterface;
use Illuminate\Http\Request;


class ContactController extends Controller
{
    private $contactRepository;

    public function __construct(ContactRepositoryInterface $contactRepository)
    {
        $this->contactRepository = $contactRepository;
    }

    public function create(Request $request): array
    {
        $response = $this->contactRepository->getToken();
        $token = $response['access_token'];
        $url = $response['base_domain'];
        $obj = $this->contactRepository->create($token, $url, $request);
        return $obj["_embedded"]["contacts"];
    }
}
