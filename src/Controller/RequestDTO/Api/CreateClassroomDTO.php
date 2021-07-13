<?php

declare(strict_types=1);

namespace App\Controller\RequestDTO\Api;

class CreateClassroomDTO
{
    public ?string $name = null;

    public ?bool $isActive = null;
}
