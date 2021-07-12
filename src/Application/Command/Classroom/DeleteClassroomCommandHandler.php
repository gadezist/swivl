<?php


namespace App\Application\Command\Classroom;


use App\Entity\Classroom;
use App\Repository\ClassroomRepositoryInterface;

class DeleteClassroomCommandHandler
{
    private ClassroomRepositoryInterface $classroomRepository;

    public function __construct(ClassroomRepositoryInterface $classroomRepository)
    {
        $this->classroomRepository = $classroomRepository;
    }

    public function __invoke(int $id)
    {
        $classroom = $this->classroomRepository->find($id);

        if ($classroom === null) {
            throw new \Exception(sprintf('Classroom with id "%s" is not found', $id));
        }
        $this->classroomRepository->remove($classroom);
    }
}
