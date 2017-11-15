<?php

namespace AppBundle\Generator;

use AppBundle\Domain\TripMeasures;
use AppBundle\Repository\TripRepository;

class AvgSpeedGenerator implements SpeedGenerator
{
    /**
     * @var TripRepository
     */
    private $repository;

    /**
     * @param TripRepository $repository
     */
    public function __construct(TripRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @inheritdoc
     */
    public function generateAvgSpeedForTrips(array $trips): array
    {
        $subtractionRanges = $this->getDistanceSubtractionResults($trips);
        $maxValues = $this->getMaxValueFromRanges($subtractionRanges);

        $avgSpeed = [];

        foreach ($maxValues as $key => $maxValue) {
            $avgSpeed[$key] = $this->calculateAvgSpeed($maxValue, $trips[$key - 1]->getMeasureInterval());
        }

        return $avgSpeed;
    }

    /**
     * @inheritdoc
     */
    public function getDistanceForTrips(array $trips): array
    {
        $distances = $this->getDistancesForTrips($trips);
        
        $result = [];
        
        foreach ($distances as $key => $distance) {
            $result[$key] = max($distance);
        }

        return $result;
    }

    private function getDistancesForTrips(array $trips)
    {
        $distances = [];

        foreach ($trips as $trip) {
            $measuresForTrip = $trip->getTripMeasures()->getValues();
            foreach ($measuresForTrip as $measureForTrip) {
                /** @var TripMeasures $measureForTrip */
                $distances[$trip->getId()][] = $measureForTrip->getDistance();
            }
        }

        return $distances;
    }

    private function getDistanceSubtractionResults(array $trips)
    {
        $distances = $this->getDistancesForTrips($trips);
        $subtractionRanges = [];

        foreach ($distances as $key => $distance) {
            for ($i = 1; $i < count($distance); $i++) {
                $subtractionRanges[$key][] = abs($distance[$i - 1] - $distance[$i]);
            }
        }

        return $subtractionRanges;
    }

    private function getMaxValueFromRanges(array $array)
    {
        $max = [];

        foreach ($array as $key => $value) {
            $max[$key] = max($value);
        }

        return $max;
    }

    private function calculateAvgSpeed(float $delta, int $interval)
    {
        return floor((self::SECONDS_IN_HOUR * $delta) / $interval);
    }
}