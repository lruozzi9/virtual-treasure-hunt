<?php

namespace App\Entity;

interface QuestionInterface
{
    public function getId(): ?int;

    public function getCode(): string;

    public function setCode(string $code): void;

    public function getAnswer(): AnswerInterface;

    public function setAnswer(AnswerInterface $answer): void;
}
