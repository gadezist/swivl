<?php

declare(strict_types=1);

namespace App\Controller\Classroom;


use App\Application\Command\Classroom\CreateClassroomCommand;
use App\Application\Command\Classroom\UpdateClassroomCommand;
use App\Application\Command\Classroom\UpdateClassroomCommandHandler;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UpdateClassroomController extends AbstractController
{
    private UpdateClassroomCommandHandler $classroomCommandHandler;

    public function __construct(UpdateClassroomCommandHandler $classroomCommandHandler)
    {
        $this->classroomCommandHandler = $classroomCommandHandler;
    }

    /**
     * @Route("/api/classrooms/update/{id}", name="classroom_update", methods={"POST"})
     * @param Request $request
     * @param $id
     * @return JsonResponse
     * @throws \Exception
     */
    public function __invoke(Request $request, $id)
    {
        $name = '';
        $isActive = false;

        if (!is_numeric($id)) {
            return new JsonResponse(['error' => 'parameter not integer'], Response::HTTP_NON_AUTHORITATIVE_INFORMATION);
        }
        if ($request->request->get('name') !== null) {
            $name = $request->request->get('name');
        }
        if ($request->request->get('is_active') !== null) {
            $isActive = (bool)$request->request->get('is_active');
        }
        $updateClassroomCommand = new UpdateClassroomCommand((int)$id, $name, $isActive);

        return new JsonResponse(($this->classroomCommandHandler)($updateClassroomCommand), Response::HTTP_OK);
    }
}
