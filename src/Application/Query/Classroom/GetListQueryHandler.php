<?php

declare(strict_types=1);

namespace App\Application\Query\Classroom;

use App\Application\Query\Classroom\DTO\ClassroomDTO;
use App\Entity\Classroom;
use App\Repository\ClassroomRepositoryInterface;

class GetListQueryHandler
{
    private ClassroomRepositoryInterface $classroomRepository;

    public function __construct(ClassroomRepositoryInterface $classroomRepository)
    {
        $this->classroomRepository = $classroomRepository;
    }

    public function __invoke()
    {
        $classroomList = $this->classroomRepository->findAll();

        return $classroomList !== [] ? $this->fetchClassroomDTO($classroomList) : [];
    }

    /**
     * @param Classroom[] $classroomList
     * @return ClassroomDTO[]
     */
    private function fetchClassroomDTO(array $classroomList): array
    {
        $classroomDTOList = [];
        foreach ($classroomList as $classroom) {
            $classroomDTO = new ClassroomDTO();
            $classroomDTO->id = $classroom->getId();
            $classroomDTO->name = $classroom->getName();
            $classroomDTOList[] = $classroomDTO;
        }

        return $classroomDTOList;
    }
}
