<?php

declare(strict_types=1);

namespace App\Entity;

interface GroupInterface
{
    public function getId(): ?int;

    public function getName(): ?string;

    public function setName(?string $name): Group;

    public function getCode(): ?string;

    public function setCode(?string $code): Group;
}
