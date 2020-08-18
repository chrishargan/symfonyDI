<?php

namespace App\Entity;

use App\Repository\MasterRepository;
use Doctrine\ORM\Mapping as ORM;
use Monolog\Logger;

/**
 * @ORM\Entity(repositoryClass=MasterRepository::class)
 */
class Master
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;
    private string $message;


    /**
     * Master constructor.
     * @param string $message             // the dependency injection is happening via the passing of the objects into the constructor rather than creating new objects inside the method.
     */
    public function __construct(string $message, Logger $logger, Transform $transform)
    {
        $logger->info($message);
        $this->message= $transform->transform($message);
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getMessage(): string
    {
        return $this->message;
    }


}
