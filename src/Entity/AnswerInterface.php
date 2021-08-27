<?php

namespace App\Entity;

interface AnswerInterface
{
    public function getId(): ?int;

    public function setQuestion(QuestionInterface $question): void;

    public function getQuestion(): QuestionInterface;
}
