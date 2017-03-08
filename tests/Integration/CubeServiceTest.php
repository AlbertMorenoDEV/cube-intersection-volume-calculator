<?php
declare(strict_types = 1);

namespace Tests\Integration;

use CubeIntersectionVolumeCalculator\Application\CubeService;

class CubeServiceTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     * @group cube-service
     */
    public function itShouldGet0Volume()
    {
        $cubeService = new CubeService();

        $coordinates1 = '0,0,0';
        $longitude1 = '2';
        $coordinates2 = '2,2,2';
        $longitude2 = '2';

        $volume = $cubeService->calculateIntersectionVolume(
            $coordinates1,
            (int) $longitude1,
            $coordinates2,
            (int) $longitude2
        );
        $this->assertEquals(0, $volume);
    }

    /**
     * @test
     * @group cube-service
     */
    public function itShouldGet1Volume()
    {
        $cubeService = new CubeService();

        $coordinates1 = '0,0,0';
        $longitude1 = '2';
        $coordinates2 = '1,1,1';
        $longitude2 = '2';

        $volume = $cubeService->calculateIntersectionVolume(
            $coordinates1,
            (int) $longitude1,
            $coordinates2,
            (int) $longitude2
        );
        $this->assertEquals(1, $volume);
    }

    /**
     * @test
     * @group cube-service
     */
    public function itShouldGet8Volume()
    {
        $cubeService = new CubeService();

        $coordinates1 = '0,0,0';
        $longitude1 = '2';
        $coordinates2 = '0,0,0';
        $longitude2 = '2';

        $volume = $cubeService->calculateIntersectionVolume(
            $coordinates1,
            (int) $longitude1,
            $coordinates2,
            (int) $longitude2
        );
        $this->assertEquals(8, $volume);
    }
}
