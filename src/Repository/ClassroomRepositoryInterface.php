<?php

declare(strict_types=1);

namespace App\Repository;

use App\Entity\Classroom;

interface ClassroomRepositoryInterface
{
    /**
     * @return Classroom[]
     */
    public function findAll();

    /**
     * @param int $id
     * @param null $lockMode
     * @param null $lockVersion
     * @return Classroom
     */
    public function find($id, $lockMode = null, $lockVersion = null);

    /**
     * @param Classroom $classroom
     */
    public function add(Classroom $classroom);

    /**
     * @param Classroom $classroom
     */
    public function remove(Classroom $classroom);
}
