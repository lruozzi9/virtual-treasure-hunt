<?php

namespace App\Entity;

interface QuestionInterface
{
    public function getId(): ?int;

    public function getCode(): string;

    public function setCode(string $code): void;
}
