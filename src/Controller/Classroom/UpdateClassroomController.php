<?php

declare(strict_types=1);

namespace App\Controller\Classroom;

use App\Application\Command\Classroom\UpdateClassroomCommand;
use App\Application\Command\Classroom\UpdateClassroomCommandHandler;
use App\Controller\RequestDTO\Api\UpdateClassroomDTO;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class UpdateClassroomController extends AbstractController
{
    private UpdateClassroomCommandHandler $classroomCommandHandler;

    private ValidatorInterface $validator;

    public function __construct(
        UpdateClassroomCommandHandler $classroomCommandHandler,
        ValidatorInterface $validator
    ) {
        $this->classroomCommandHandler = $classroomCommandHandler;
        $this->validator = $validator;
    }

    /**
     * @Route("/api/classrooms/update/{id}", name="classroom_update", methods={"POST"})
     * @param Request $request
     * @param int $id
     * @return JsonResponse
     * @throws \Exception
     */
    public function __invoke(Request $request, int $id)
    {
        $updateClassroomDTO = $this->prepareUpdateClassroomDTO($request, $id);

        $errors = $this->validator->validate($updateClassroomDTO);

        if (count($errors) > 0) {
            $errorsString = (string)$errors;

            return new JsonResponse(['error' => $errorsString], Response::HTTP_BAD_REQUEST);
        }

        $updateClassroomCommand = new UpdateClassroomCommand(
            $updateClassroomDTO->id,
            $updateClassroomDTO->name,
            $updateClassroomDTO->isActive
        );

        return new JsonResponse(($this->classroomCommandHandler)($updateClassroomCommand), Response::HTTP_OK);
    }

    public function prepareUpdateClassroomDTO(Request $request, int $id): UpdateClassroomDTO
    {
        $updateClassroomDTO = new UpdateClassroomDTO();
        $updateClassroomDTO->id = $id;
        $updateClassroomDTO->name = $request->request->get('name');
        $updateClassroomDTO->isActive = (bool)$request->request->get('is_active');

        return $updateClassroomDTO;
    }
}
