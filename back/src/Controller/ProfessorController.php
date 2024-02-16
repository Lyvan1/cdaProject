<?php

namespace App\Controller;

use App\Entity\Professor;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Validator\Constraints\Date;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class ProfessorController extends AbstractController
{
    public function __construct(private ValidatorInterface $validator)
    {
        //Initialisation des interfaces et variables utiles dans les méthodes de la classe.
    }

    // C
    //Route pour créer un professeur
    #[Route('/professors', methods: 'POST')]
    public function createProfessors(Request $request): JsonResponse
    {
        //Appel de la méthode payload issue du custom abstract controller.
        $payload = $this->getPayload($request);

        //initialisation d'une instance de Professor. Les paramètres qui sont fournis sont obligatoire, car déclarés dans le constructeur
        // de la classe Professor.
        $professor = new Professor(
            $this->get('numen'),
            $this->get('phoneNumber'),
            $this->get('email'),
            $this->get('username'),
            $this->get('firstname'),
            $this->get('lastname'),
            new \DateTimeImmutable()
        );

        /*
         *  $errors permettra de recueillir le tableau des erreurs, suivant les spécifités établies dans la class Professor
         * grâce aux annotations.
         */

        $errors = $this->validator->validate($professor);

        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/ProfessorController.php',
        ]);
    }
}
