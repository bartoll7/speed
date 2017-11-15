<?php

namespace AppBundle\Factory;

use AppBundle\View\AvgSpeedView;

interface ViewFactory
{
    /**
     * @return AvgSpeedView[]
     */
    public function createCollection(): array;
}