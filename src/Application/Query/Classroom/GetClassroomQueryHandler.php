<?php

declare(strict_types=1);

namespace App\Application\Query\Classroom;

use App\Application\Query\Classroom\DTO\ClassroomDTO;
use App\Entity\Classroom;
use App\Repository\ClassroomRepositoryInterface;

class GetClassroomQueryHandler
{
    private ClassroomRepositoryInterface $classroomRepository;

    public function __construct(ClassroomRepositoryInterface $classroomRepository)
    {
        $this->classroomRepository = $classroomRepository;
    }

    public function __invoke($id)
    {
        $classroom = $this->classroomRepository->find((int)$id);

        return $classroom ? $this->fetchClassroomDTO($classroom) : [];
    }

    private function fetchClassroomDTO(Classroom $classroom): ClassroomDTO
    {
        $classroomDTO = new ClassroomDTO();
        $classroomDTO->id = $classroom->getId();
        $classroomDTO->name = $classroom->getName();
        $classroomDTO->isActive = $classroom->getIsActive();

        return $classroomDTO;
    }
}
