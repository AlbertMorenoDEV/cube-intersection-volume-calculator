<?php
declare(strict_types = 1);

namespace NektriaTest\Domain;

class Cube
{
    private $coordinate;
    private $longitude;

    /**
     * Cube constructor.
     * @param Coordinate $coordinate
     * @param int $longitude
     */
    public function __construct(Coordinate $coordinate, int $longitude)
    {
        $this->coordinate = $coordinate;
        $this->longitude = $longitude;
    }

    /**
     * @return Coordinate
     */
    public function getCoordinate(): Coordinate
    {
        return $this->coordinate;
    }

    /**
     * @return int
     */
    public function getLongitude(): int
    {
        return $this->longitude;
    }

    /**
     * @param Cube $cube
     * @return float
     */
    public function getIntersectionArea(Cube $cube): float
    {
        $maxClosestCoordinate = $this->coordinate->getMaxCoordinate($cube->getCoordinate());
        $minFurthestCoordinate = $this->getHigherCoordinate()->getMinCoordinate($cube->getHigherCoordinate());

        $longitudeX = $minFurthestCoordinate->getX() - $maxClosestCoordinate->getX();
        $longitudeY = $minFurthestCoordinate->getY() - $maxClosestCoordinate->getY();
        $longitudeZ = $minFurthestCoordinate->getZ() - $maxClosestCoordinate->getZ();
        return $longitudeX * $longitudeY * $longitudeZ;
    }

    public function getHigherCoordinate(): Coordinate
    {
        return new Coordinate(
            $this->coordinate->getX() + $this->longitude,
            $this->coordinate->getY() + $this->longitude,
            $this->coordinate->getZ() + $this->longitude
        );
    }
}
