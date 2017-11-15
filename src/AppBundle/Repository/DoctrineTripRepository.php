<?php

namespace AppBundle\Repository;

use AppBundle\Domain\Trips;
use Doctrine\ORM\EntityManagerInterface;

class DoctrineTripRepository implements TripRepository
{
    /**
     * @var EntityManagerInterface
     */
    private $entityManager;

    /**
     * @param EntityManagerInterface $entityManager
     */
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * @inheritdoc
     */
    public function getAllTrips(): array
    {
        $query = $this->entityManager->createQueryBuilder()
            ->select('trips')
            ->from(Trips::class, 'trips')
            ->getQuery()
            ->getResult();

        return $query;
    }
}