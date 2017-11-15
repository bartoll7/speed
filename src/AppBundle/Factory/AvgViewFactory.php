<?php

namespace AppBundle\Factory;

use AppBundle\Domain\Trips;
use AppBundle\Generator\SpeedGenerator;
use AppBundle\Repository\TripRepository;
use AppBundle\View\AvgSpeedView;

class AvgViewFactory implements ViewFactory
{
    /**
     * @var SpeedGenerator
     */
    private $generator;

    /**
     * @var TripRepository
     */
    private $repository;

    /**
     * @param SpeedGenerator $generator
     * @param TripRepository $repository
     */
    public function __construct(SpeedGenerator $generator, TripRepository $repository)
    {
        $this->generator = $generator;
        $this->repository = $repository;
    }

    /**
     * @inheritdoc
     */
    public function createCollection(): array
    {
        $trips = $this->repository->getAllTrips();
        $avgSpeed = $this->generator->generateAvgSpeedForTrips($trips);
        $distance = $this->generator->getDistanceForTrips($trips);

        $results = [];

        foreach ($trips as $key => $trip) {
            if ($this->skipIfNotEnoughMeasures($trip)) continue;
            $results[] = new AvgSpeedView(
                $trip->getName(),
                $distance[$key + 1],
                $trip->getMeasureInterval(),
                $avgSpeed[$key + 1]
            );
        }

        return $results;
    }

    private function skipIfNotEnoughMeasures(Trips $trip): bool
    {
        return count($trip->getTripMeasures()->getValues()) <= 1;
    }
}