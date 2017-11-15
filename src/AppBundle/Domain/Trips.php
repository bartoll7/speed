<?php

namespace AppBundle\Domain;

use Doctrine\Common\Collections\ArrayCollection;

class Trips
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var int
     */
    private $measureInterval;

    /**
     * @var ArrayCollection
     */
    private $tripMeasures;

    public function __construct()
    {
        $this->tripMeasures = new ArrayCollection();
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return int
     */
    public function getMeasureInterval(): int
    {
        return $this->measureInterval;
    }

    /**
     * @return ArrayCollection
     */
    public function getTripMeasures()
    {
        return $this->tripMeasures;
    }
}