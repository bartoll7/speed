<?php

namespace AppBundle\Domain;

class TripMeasures
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var Trips
     */
    private $trips;

    /**
     * @var float
     */
    private $distance;

    /**
     * @return int
     */
    public function getId():int
    {
        return $this->id;
    }

    /**
     * @return Trips
     */
    public function getTrips(): Trips
    {
        return $this->trips;
    }

    /**
     * @return float
     */
    public function getDistance():float
    {
        return $this->distance;
    }
}