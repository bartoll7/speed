<?php

namespace AppBundle\Generator;

use AppBundle\Domain\Trips;

interface SpeedGenerator
{
    const SECONDS_IN_HOUR = 3600;
    
    /**
     * @param Trips[] $trips
     * @return array
     */
    public function generateAvgSpeedForTrips(array $trips): array;

    /**
     * @param array $trips
     * @return array
     */
    public function getDistanceForTrips(array $trips): array;
}