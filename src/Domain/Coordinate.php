<?php
declare(strict_types = 1);

namespace CubeIntersectionVolumeCalculator\Domain;

class Coordinate
{
    private $x;
    private $y;
    private $z;

    /**
     * Coordinate constructor.
     * @param integer $x
     * @param integer $y
     * @param integer $z
     */
    public function __construct(int $x, int $y, int $z)
    {
        $this->x = $x;
        $this->y = $y;
        $this->z = $z;
    }

    /**
     * @param string $coordinate
     * @return Coordinate
     * @throws \CubeIntersectionVolumeCalculator\Domain\InvalidCoordinateException
     */
    public static function fromString(string $coordinate): self
    {
        static::validateString($coordinate);

        $coordinateArray = explode(',', $coordinate);
        return new self(
            (int) $coordinateArray[0],
            (int) $coordinateArray[1],
            (int) $coordinateArray[2]
        );
    }

    /**
     * @param string $coordinate
     * @throws \CubeIntersectionVolumeCalculator\Domain\InvalidCoordinateException
     */
    private static function validateString(string $coordinate): void
    {
        $coordinateArray = explode(',', $coordinate);

        if (count($coordinateArray) < 3) {
            throw new InvalidCoordinateException('Invalid format');
        }

        if (!is_int($coordinateArray[0] + 0)) {
            throw new InvalidCoordinateException('Invalid format');
        }

        if (!is_int($coordinateArray[1] + 0)) {
            throw new InvalidCoordinateException('Invalid format');
        }

        if (!is_int($coordinateArray[2] + 0)) {
            throw new InvalidCoordinateException('Invalid format');
        }
    }

    /**
     * @param Coordinate $coordinate
     * @return Coordinate
     */
    public function getMaxCoordinate(Coordinate $coordinate): Coordinate
    {
        $maxX = ($this->x > $coordinate->getX()) ? $this->x : $coordinate->getX();
        $maxY = ($this->y > $coordinate->getY()) ? $this->y : $coordinate->getY();
        $maxZ = ($this->z > $coordinate->getZ()) ? $this->z : $coordinate->getZ();
        return new Coordinate($maxX, $maxY, $maxZ);
    }

    /**
     * @param Coordinate $coordinate
     * @return Coordinate
     */
    public function getMinCoordinate(Coordinate $coordinate): Coordinate
    {
        $maxX = ($this->x < $coordinate->getX()) ? $this->x : $coordinate->getX();
        $maxY = ($this->y < $coordinate->getY()) ? $this->y : $coordinate->getY();
        $maxZ = ($this->z < $coordinate->getZ()) ? $this->z : $coordinate->getZ();
        return new Coordinate($maxX, $maxY, $maxZ);
    }

    /**
     * @return int
     */
    public function getX(): int
    {
        return $this->x;
    }

    /**
     * @return int
     */
    public function getY(): int
    {
        return $this->y;
    }

    /**
     * @return int
     */
    public function getZ(): int
    {
        return $this->z;
    }
}
