<?php

namespace App\Entity;

use App\Repository\TourFileRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=TourFileRepository::class)
 * @ORM\Table(name="tour_file")
 */
class TourFile
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $json;

    /**
     * @ORM\Column(type="integer")
     * @Assert\Length(
     *     min=0,
     *     max=1
     * )
     */
    private $is_processed;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getIsProcessed(): ?int
    {
        return $this->is_processed;
    }

    public function setIsProcessed(int $is_processed): self
    {
        $this->is_processed = $is_processed;

        return $this;
    }
}
