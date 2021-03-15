<?php

namespace App\Entity;

use App\Repository\APINewsRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=APINewsRepository::class)
 */
class APINews
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

     /**
     * @ORM\Column(type="array", nullable=true)
     */
    private $json = [];

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    public $date;

    public function getId(): ?int
    {
        return $this->id;
    }


    public function getJson($json)
    {
        return $this->json;
    }

    public function setJson(array $json): self
    {
        $this->json = $json;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(?\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

}
