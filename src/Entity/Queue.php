<?php

namespace App\Entity;

use App\Repository\QueueRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=QueueRepository::class)
 * @ORM\Table(name="queue")
 */
class Queue
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $tour_file_id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $json;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTourFileId(): ?int
    {
        return $this->tour_file_id;
    }

    public function setTourFileId(int $tour_file_id): self
    {
        $this->tour_file_id = $tour_file_id;

        return $this;
    }

    public function getJson(): ?string
    {
        return $this->json;
    }

    public function setJson(string $json): self
    {
        $this->json = $json;

        return $this;
    }
}
