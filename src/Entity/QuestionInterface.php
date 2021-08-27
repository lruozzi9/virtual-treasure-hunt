<?php

namespace App\Entity;

use Knp\DoctrineBehaviors\Contract\Entity\TranslatableInterface;

interface QuestionInterface extends TranslatableInterface
{
    public function getId(): ?int;

    public function getCode(): string;

    public function setCode(string $code): void;

    public function getAnswer(): AnswerInterface;

    public function setAnswer(AnswerInterface $answer): void;
}
