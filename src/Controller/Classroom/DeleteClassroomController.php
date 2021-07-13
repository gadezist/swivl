<?php

declare(strict_types=1);

namespace App\Controller\Classroom;

use App\Application\Command\Classroom\DeleteClassroomCommandHandler;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DeleteClassroomController extends AbstractController
{
    private DeleteClassroomCommandHandler $classroomCommandHandler;

    public function __construct(DeleteClassroomCommandHandler $classroomCommandHandler)
    {
        $this->classroomCommandHandler = $classroomCommandHandler;
    }

    /**
     * @Route("/api/classrooms/delete/{id}", name="classroom_delete_id", methods={"DELETE"})
     * @param int $id
     * @return JsonResponse
     */
    public function __invoke(int $id)
    {
        return new JsonResponse(($this->classroomCommandHandler)($id), Response::HTTP_OK);
    }
}
