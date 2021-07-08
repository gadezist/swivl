<?php


namespace App\Application\Command\Classroom;


use App\Entity\Classroom;
use App\Repository\ClassroomRepositoryInterface;

class CreateClassroomCommandHandler
{
    private ClassroomRepositoryInterface $classroomRepository;

    public function __construct(ClassroomRepositoryInterface $classroomRepository)
    {
        $this->classroomRepository = $classroomRepository;
    }

    public function __invoke(CreateClassroomCommand $classroomCommand)
    {
        $classroom = new Classroom($classroomCommand->getName(), $classroomCommand->getIsActive());

        $this->classroomRepository->add($classroom);
    }
}
