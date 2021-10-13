<?php

namespace App\Repository;

use App\Entity\TourFile;
use Doctrine\ORM\EntityRepository;

/**
 * @method TourFile|null find($id, $lockMode = null, $lockVersion = null)
 * @method TourFile|null findOneBy(array $criteria, array $orderBy = null)
 * @method TourFile[]    findAll()
 * @method TourFile[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TourFileRepository extends EntityRepository
{
    private const TOUR_FILE_IS_NOT_PROCESSED = 0;

     /**
      * @return TourFile[]|null
      */
    public function findNotProcessedTourFiles(): ?array
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.is_processed = :val')
            ->setParameter('val', self::TOUR_FILE_IS_NOT_PROCESSED)
            ->orderBy('t.id', 'ASC')
            ->getQuery()
            ->getResult();
    }
}
