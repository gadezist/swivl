<?php

declare(strict_types=1);

namespace App\Controller\Classroom;

use App\Application\Query\Classroom\GetClassroomQueryHandler;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class GetClassroomController extends AbstractController
{
    private GetClassroomQueryHandler $classroomQueryHandler;

    public function __construct(GetClassroomQueryHandler $classroomQueryHandler)
    {
        $this->classroomQueryHandler = $classroomQueryHandler;
    }

    /**
     * @Route("/api/classrooms/{id}", name="classroom_id", methods={"GET"})
     * @param int $id
     * @return JsonResponse
     */
    public function __invoke(int $id)
    {
        return new JsonResponse(($this->classroomQueryHandler)($id), Response::HTTP_OK);
    }
}
