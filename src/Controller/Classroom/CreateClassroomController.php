<?php

declare(strict_types=1);

namespace App\Controller\Classroom;

use App\Application\Command\Classroom\CreateClassroomCommand;
use App\Application\Command\Classroom\CreateClassroomCommandHandler;
use App\Controller\RequestDTO\Api\CreateClassroomDTO;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class CreateClassroomController extends AbstractController
{
    private CreateClassroomCommandHandler $classroomCommandHandler;

    private ValidatorInterface $validator;

    public function __construct(
        CreateClassroomCommandHandler $classroomCommandHandler,
        ValidatorInterface $validator
    )
    {
        $this->classroomCommandHandler = $classroomCommandHandler;
        $this->validator = $validator;
    }

    /**
     * @Route("/api/classrooms/create", name="classroom_create", methods={"POST"})
     * @param Request $request
     * @return JsonResponse
     */
    public function __invoke(Request $request)
    {
        $createClassroomDTO = $this->prepareCreateClassroomDTO($request);

        $errors = $this->validator->validate($createClassroomDTO);

        if (count($errors) > 0) {
            $errorsString = (string)$errors;

            return new JsonResponse(['error' => $errorsString], Response::HTTP_BAD_REQUEST);
        }

        $createClassroomCommand = new CreateClassroomCommand(
            $createClassroomDTO->name,
            $createClassroomDTO->isActive
        );

        ($this->classroomCommandHandler)($createClassroomCommand);

        return new JsonResponse(['status' => 'ok'], Response::HTTP_OK);
    }

    public function prepareCreateClassroomDTO(Request $request): CreateClassroomDTO
    {
        $updateClassroomDTO = new CreateClassroomDTO();
        $updateClassroomDTO->name = $request->request->get('name');
        $updateClassroomDTO->isActive = (bool)$request->request->get('is_active');

        return $updateClassroomDTO;
    }
}
