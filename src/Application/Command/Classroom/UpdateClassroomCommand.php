<?php

declare(strict_types=1);

namespace App\Application\Command\Classroom;

class UpdateClassroomCommand
{
    private int $id;

    private ?string $name;

    private ?bool $isActive;

    public function __construct(int $id, ?string $name, ?bool $isActive)
    {
        $this->id = $id;
        $this->name = $name;
        $this->isActive = $isActive;
    }

    public function getId()
    {
        return $this->id;
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
