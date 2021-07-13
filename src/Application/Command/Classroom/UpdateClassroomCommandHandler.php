<?php

declare(strict_types=1);

namespace App\Application\Command\Classroom;

use App\Repository\ClassroomRepositoryInterface;
use Doctrine\ORM\EntityNotFoundException;

class UpdateClassroomCommandHandler
{
    private ClassroomRepositoryInterface $classroomRepository;

    public function __construct(ClassroomRepositoryInterface $classroomRepository)
    {
        $this->classroomRepository = $classroomRepository;
    }

    /**
     * @param UpdateClassroomCommand $classroomCommand
     * @throws EntityNotFoundException
     */
    public function __invoke(UpdateClassroomCommand $classroomCommand)
    {
        $classroom =  $this->classroomRepository->find($classroomCommand->getId());
        if ($classroom === null) {
            throw new EntityNotFoundException(sprintf('Classroom with id "%s" is not found', $classroomCommand->getId()));
        }

        if (null === $classroomCommand->getName()) {
            $classroom->setName($classroomCommand->getName());
        }

        if (null === $classroomCommand->getIsActive()) {
            $classroom->setIsActive($classroomCommand->getIsActive());
        }

        $this->classroomRepository->add($classroom);
    }
}
