<?php

declare(strict_types=1);

namespace App\Controller\Classroom;

use App\Application\Query\Classroom\GetListQueryHandler;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class GetListController extends AbstractController
{
    private GetListQueryHandler $getListQueryHandler;

    public function __construct(GetListQueryHandler $getListQueryHandler)
    {
        $this->getListQueryHandler = $getListQueryHandler;
    }

    /**
     * @Route("/api/classrooms", name="classroom_list", methods={"GET"})
     */
    public function __invoke()
    {
        return new JsonResponse(($this->getListQueryHandler)(), Response::HTTP_OK);
    }
}
