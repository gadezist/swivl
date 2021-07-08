<?php


namespace App\Repository;


use App\Entity\Classroom;

interface ClassroomRepositoryInterface
{
    /**
     * @return Classroom[]
     */
    public function findAll();

    /**
     * @param Classroom $classroom
     */
    public function add(Classroom $classroom);
}
