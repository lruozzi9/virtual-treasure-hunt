<?php


namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity()
 */
class AnswerTranslation implements TranslationInterface
{
    use TranslationTrait;
}
