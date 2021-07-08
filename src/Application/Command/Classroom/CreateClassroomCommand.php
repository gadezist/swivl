<?php


namespace App\Application\Command\Classroom;


class CreateClassroomCommand
{
    private string $name;

    private bool $isActive;

    public function __construct(string $name, bool $isActive)
    {
        $this->name = $name;
        $this->isActive = $isActive;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getIsActive()
    {
        return $this->isActive;
    }
}
