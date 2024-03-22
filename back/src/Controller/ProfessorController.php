<?php

namespace App\Controller;

use App\Entity\Professor;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Validator\Constraints\Date;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class ProfessorController extends AbstractController
{
    public function __construct(private ValidatorInterface $validator)
    {
        //Initialisation des interfaces et variables utiles dans les méthodes de la classe.
    }


    //Route pour créer un professeur
    #[Route('/professors', methods: 'POST')]
    public function createProfessors(Request $request): JsonResponse
    {
        //Appel de la méthode payload issue du custom abstract controller.
        $payload = $this->getPayload($request);

        //initialisation d'une instance de Professor. Les paramètres qui sont fournis sont obligatoire, car déclarés dans le constructeur
        // de la classe Professor.
        $professor = new Professor(
            $payload->get('numen'),
            $payload->get('phoneNumber'),
            $payload->get('email'),
            $payload->get('username'),
            $payload->get('firstname'),
            $payload->get('lastname'),
            $payload->get('password'),
            $payload->get('birthdate')
        );

        /*
         * $errors permettra de recueillir le tableau des erreurs, suivant les spécifités établies dans la class Professor
         * grâce aux annotations.
         */

        $errors = $this->validator->validate($professor);

        $errorsArray = [];


        if(count($errors) > 0){
            foreach($errors as $error){
                $errorsArray['violations'][] = ['property' => $error->getPropertyPath(), 'message' => $error->getMessage()];
            }
            return $this->json($errorsArray, Response::HTTP_BAD_REQUEST);
        }

        return $this->json(
            ['You are registered as a teacher. Use your username and password to log in.'],
            Response::HTTP_CREATED
        );
    }
}
