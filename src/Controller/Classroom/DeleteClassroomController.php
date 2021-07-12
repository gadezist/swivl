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
     * @param $id
     * @return JsonResponse
     */
    public function __invoke($id)
    {
        if (!is_numeric($id)) {
            return new JsonResponse(['error' => 'parameter not integer'], Response::HTTP_NON_AUTHORITATIVE_INFORMATION);
        }
        return new JsonResponse(($this->classroomCommandHandler)((int)$id), Response::HTTP_OK);
    }
}
