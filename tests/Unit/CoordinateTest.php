<?php
declare(strict_types = 1);

namespace Tests\Unit;

use CubeIntersectionVolumeCalculator\Domain\Coordinate;
use CubeIntersectionVolumeCalculator\Domain\InvalidCoordinateException;

class CoordinateTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     * @group coordinate
     */
    public function itShouldThrowExceptionWithInvalidFormat()
    {
        $this->expectException(InvalidCoordinateException::class);

        $coordinate = Coordinate::fromString('1');
    }

    /**
     * @test
     * @group coordinate
     */
    public function itShouldThrowExceptionWithoutOneAxis()
    {
        $this->expectException(InvalidCoordinateException::class);

        $coordinate = Coordinate::fromString('1,1');
    }

    /**
     * @test
     * @group coordinate
     */
    public function itShouldCreateCoordinate()
    {
        $coordinate = Coordinate::fromString('1,2,3');
        $this->assertEquals(1, $coordinate->getX());
        $this->assertEquals(2, $coordinate->getY());
        $this->assertEquals(3, $coordinate->getZ());
    }

    /**
     * @test
     * @group coordinate
     */
    public function itShouldReturnMaxCoordinate()
    {
        $coordinate1 = Coordinate::fromString('1,2,3');
        $coordinate2 = Coordinate::fromString('3,2,1');
        $maxCoordinate = $coordinate1->getMaxCoordinate($coordinate2);

        $this->assertEquals(3, $maxCoordinate->getX());
        $this->assertEquals(2, $maxCoordinate->getY());
        $this->assertEquals(3, $maxCoordinate->getZ());
    }

    /**
     * @test
     * @group coordinate
     */
    public function itShouldReturnMinCoordinate()
    {
        $coordinate1 = Coordinate::fromString('1,2,3');
        $coordinate2 = Coordinate::fromString('3,2,1');
        $maxCoordinate = $coordinate1->getMinCoordinate($coordinate2);

        $this->assertEquals(1, $maxCoordinate->getX());
        $this->assertEquals(2, $maxCoordinate->getY());
        $this->assertEquals(1, $maxCoordinate->getZ());
    }
}
