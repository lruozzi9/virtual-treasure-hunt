<?php

namespace App\Entity;

use App\Repository\QuestionRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=QuestionRepository::class)
 */
class Question implements QuestionInterface
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private ?int $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=false, unique=true)
     */
    private string $code;

    /**
     * One Question has One Answer.
     * @ORM\OneToOne(targetEntity="App\Entity\Answer", mappedBy="question", cascade={"persist", "remove"})
     */
    private AnswerInterface $answer;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCode(): string
    {
        return $this->code;
    }

    public function setCode(string $code): void
    {
        $this->code = $code;
    }

    public function getAnswer(): AnswerInterface
    {
        return $this->answer;
    }

    public function setAnswer(AnswerInterface $answer): void
    {
        $this->answer = $answer;
    }
}
