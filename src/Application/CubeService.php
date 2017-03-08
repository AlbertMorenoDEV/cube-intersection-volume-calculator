<?php
declare(strict_types = 1);

namespace CubeIntersectionVolumeCalculator\Application;

use CubeIntersectionVolumeCalculator\Domain\Coordinate;
use CubeIntersectionVolumeCalculator\Domain\Cube;

class CubeService
{
    /**
     * @param string $coordinate1
     * @param integer $longitude1
     * @param string $coordinate2
     * @param integer $longitude2
     * @return float
     * @throws \CubeIntersectionVolumeCalculator\Domain\InvalidCoordinateException
     */
    public function calculateIntersectionVolume(
        string $coordinate1,
        int $longitude1,
        string $coordinate2,
        int $longitude2
    ): float
    {
        $coordinate1 = Coordinate::fromString($coordinate1);
        $coordinate2 = Coordinate::fromString($coordinate2);
        $cube1 = new Cube($coordinate1, $longitude1);
        $cube2 = new Cube($coordinate2, $longitude2);

        return $cube1->getIntersectionArea($cube2);
    }
}
