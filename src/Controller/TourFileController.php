<?php

namespace App\Controller;

use App\Entity\TourFile;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class TourFileController extends AbstractController
{
    /* @var EntityManagerInterface $entityManager */
    protected $entityManager;

    /**
     * @return TourFile[]|null
     */
    public function getNotProcessedTourFiles(): ?array
    {
        return $this->entityManager->getRepository(TourFile::class)->findNotProcessedTourFiles();
    }
}
