<?php

namespace AppBundle\View;

class AvgSpeedView
{
    /**
     * @var string
     */
    private $name;
    
    /**
     * @var float
     */
    private $distance;

    /**
     * @var int
     */
    private $measureInterval;

    /**
     * @var int
     */
    private $avgSpeed;

    /**
     * @param string $name
     * @param float $distance
     * @param int $measureInterval
     * @param int $avgSpeed
     */
    public function __construct($name, $distance, $measureInterval, $avgSpeed)
    {
        $this->name = $name;
        $this->distance = $distance;
        $this->measureInterval = $measureInterval;
        $this->avgSpeed = $avgSpeed;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return float
     */
    public function getDistance(): float
    {
        return $this->distance;
    }

    /**
     * @return int
     */
    public function getMeasureInterval(): int
    {
        return $this->measureInterval;
    }

    /**
     * @return int
     */
    public function getAvgSpeed(): int
    {
        return $this->avgSpeed;
    }
}