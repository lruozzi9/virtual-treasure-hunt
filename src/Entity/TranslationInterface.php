<?php

declare(strict_types=1);

namespace App\Entity;

use Knp\DoctrineBehaviors\Contract\Entity\TranslationInterface as BaseTranslationInterface;

interface TranslationInterface extends BaseTranslationInterface
{
    public function getId(): ?int;

    public function getLabel(): string;

    public function setLabel(string $label): void;
}
