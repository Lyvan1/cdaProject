<?php

namespace App\Controller;


use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;

class UserController extends AbstractController
{
    #[Route('/users', name: 'app_users', methods: 'POST')]
    public function createUser(Request $request): JsonResponse
    {
        $this->getPaylooad($request);
        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/UserController.php',
        ]);
    }
}
