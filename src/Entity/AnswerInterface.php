<?php

namespace App\Entity;

use Knp\DoctrineBehaviors\Contract\Entity\TranslatableInterface;

interface AnswerInterface extends TranslatableInterface
{
    public function getId(): ?int;

    public function setQuestion(QuestionInterface $question): void;

    public function getQuestion(): QuestionInterface;
}
