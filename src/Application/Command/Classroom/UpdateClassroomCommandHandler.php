<?php


namespace App\Application\Command\Classroom;


use App\Entity\Classroom;
use App\Repository\ClassroomRepositoryInterface;

class UpdateClassroomCommandHandler
{
    private ClassroomRepositoryInterface $classroomRepository;

    public function __construct(ClassroomRepositoryInterface $classroomRepository)
    {
        $this->classroomRepository = $classroomRepository;
    }

    public function __invoke(UpdateClassroomCommand $classroomCommand)
    {

        $classroom =  $this->classroomRepository->find($classroomCommand->getId());
        if ($classroom === null) {
            throw new \Exception(sprintf('Classroom with id "%s" is not found', $classroomCommand->getId()));
        }

        if ($classroomCommand->getName()) {
            $classroom->setName($classroomCommand->getName());
        }
        if ($classroomCommand->getIsActive()) {
            $classroom->setName($classroomCommand->getIsActive());
        }

        $this->classroomRepository->add($classroom);
    }
}
