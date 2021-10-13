<?php

namespace App\Service;

use App\Entity\Queue;
use App\Entity\TourFile;
use App\Repository\QueueRepository;
use Doctrine\ORM\EntityManagerInterface;
use Exception;

class QueueService
{
    private const TOUR_FILE_IS_PROCESSED = 1;

    /* @var QueueRepository $repository */
    protected $repository;

    /**
     * @param EntityManagerInterface $entityManager
     * @param TourFile[]|null $tourFiles
     * @return void
     *
     * @throws Exception
     */
    public function addToQueue(EntityManagerInterface $entityManager, ?array $tourFiles = null): void
    {
        if (isset($tourFiles)) {
            foreach ($tourFiles as $tourFile) {
                // add tour file to queue for processing
                $queue = new Queue();
                $queue->setTourFileId($tourFile->getId());
                $queue->setJson($tourFile->getJson());
                $entityManager->persist($queue);
                $entityManager->flush();

                // update is_processed field for current tour file
                $queuedTourFile = $entityManager->getRepository(TourFile::class)->find($tourFile->getId());

                if (!$queuedTourFile) {
                    throw new Exception(
                        'No tour file found for id ' . $tourFile->getId()
                    );
                }

                $queuedTourFile->setIsProcessed(self::TOUR_FILE_IS_PROCESSED);
                $entityManager->flush();
            }
        }
    }

    /**
     * @return Queue[]
     */
    public function getFromQueue(): array
    {
        return $this->repository->findAll();
    }
}