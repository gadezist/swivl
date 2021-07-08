<?php

declare(strict_types=1);

namespace App\Controller\Classroom;


use App\Application\Command\Classroom\CreateClassroomCommand;
use App\Application\Command\Classroom\CreateClassroomCommandHandler;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CreateClassroomController extends AbstractController
{
    private CreateClassroomCommandHandler $classroomCommandHandler;

    public function __construct(CreateClassroomCommandHandler $classroomCommandHandler)
    {
        $this->classroomCommandHandler = $classroomCommandHandler;
    }

    /**
     * @Route("/api/classrooms/create", name="classroom_create", methods={"POST"})
     * @param Request $request
     * @return JsonResponse
     */
    public function __invoke(Request $request)
    {
        $createClassroomCommand = new CreateClassroomCommand($request->request->get('name'), (bool)$request->request->get('is_active'));
        ($this->classroomCommandHandler)($createClassroomCommand);
        return new JsonResponse([], Response::HTTP_OK);
    }
}
