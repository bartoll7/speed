<?php
namespace AppBundle\Repository;

use AppBundle\Domain\Trips;

interface TripRepository
{
    /**
     * @return Trips[]
     */
    public function getAllTrips(): array;
}