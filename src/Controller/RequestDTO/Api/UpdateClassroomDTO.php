<?php

declare(strict_types=1);

namespace App\Controller\RequestDTO\Api;

class UpdateClassroomDTO
{
    public int $id;

    public ?string $name = null;

    public ?bool $isActive = null;
}
