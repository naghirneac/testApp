<?php

namespace App\Controller;

use App\Entity\Queue;
use App\Entity\TourFile;
use App\Service\QueueService;
use Exception;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\ORM\EntityManagerInterface;

class QueueController extends AbstractController
{
    /* @var QueueService $queueService */
    protected $queueService;

    /* @var EntityManagerInterface $entityManager */
    protected $entityManager;

    /**
     * @param TourFile[]|null $tourFiles
     * @return Response
     *
     * @throws Exception
     */
    public function addToQueue(?array $tourFiles = null): Response
    {
        $this->queueService->addToQueue($this->entityManager, $tourFiles);
        return new Response();
    }

    /**
     * @return Queue[]
     */
    public function getFromQueue(): array
    {
        return $this->queueService->getFromQueue();
    }
}