<?php

declare(strict_types=1);

namespace App\Application\Command\Classroom;

use App\Repository\ClassroomRepositoryInterface;
use Doctrine\ORM\EntityNotFoundException;

class DeleteClassroomCommandHandler
{
    private ClassroomRepositoryInterface $classroomRepository;

    public function __construct(ClassroomRepositoryInterface $classroomRepository)
    {
        $this->classroomRepository = $classroomRepository;
    }

    /**
     * @param int $id
     * @throws EntityNotFoundException
     */
    public function __invoke(int $id)
    {
        $classroom = $this->classroomRepository->find($id);

        if ($classroom === null) {
            throw new EntityNotFoundException(sprintf('Classroom with id "%s" is not found', $id));
        }
        $this->classroomRepository->remove($classroom);
    }
}
