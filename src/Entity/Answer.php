<?php

namespace App\Entity;

use App\Repository\AnswerRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AnswerRepository::class)
 */
class Answer implements AnswerInterface
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * One Answer has One Question.
     * @ORM\OneToOne(targetEntity="App\Entity\Question", inversedBy="answer", cascade={"persist", "remove"})
     * @ORM\JoinColumn(name="question_id", referencedColumnName="id", nullable=false, unique=true)
     */
    private QuestionInterface $question;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getQuestion(): QuestionInterface
    {
        return $this->question;
    }

    public function setQuestion(QuestionInterface $question): void
    {
        $this->question = $question;
    }
}
