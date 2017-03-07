<?php
declare(strict_types = 1);

namespace NektriaTest\Infrastructure\Console;

use NektriaTest\Application\CubeService;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Question\Question;

class CalculateCubesIntersectionVolumeCommand extends Command
{
    protected function configure()
    {
        $this
            ->setName('app:calculate-cubes-intersection-volume')
            ->setDescription('Calculate cubes intersection volume of two cubes.')
            ->setHelp('It should receive border longitude and coordinates.');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $helper = $this->getHelper('question');

        $output->writeln([
            'Calculate cubes intersection volume',
            '============',
            '',
        ]);

        $question = new Question('Coordinates of first cube (format: x,y,z): ');
        $question->setValidator(function ($answer) {
            if (!is_string($answer) || substr_count($answer, ',') !== 2) {
                throw new \RuntimeException('The coordinates should have format x,y,z');
            }

            return $answer;
        });
        $coordinates1 = $helper->ask($input, $output, $question);

        $question = new Question('Longitude of borders of first cube (format: l): ');
        $question->setValidator(function ($answer) {
            if (null === $answer) {
                throw new \RuntimeException('The longitude should be an integer');
            }

            return $answer;
        });
        $longitude1 = $helper->ask($input, $output, $question);

        $question = new Question('Coordinates of second cube (format: x,y,z): ');
        $question->setValidator(function ($answer) {
            if (!is_string($answer) || substr_count($answer, ',') !== 2) {
                throw new \RuntimeException('The coordinates should have format x,y,z');
            }

            return $answer;
        });
        $coordinates2 = $helper->ask($input, $output, $question);

        $question = new Question('Longitude of borders of second cube (format: l): ');
        $question->setValidator(function ($answer) {
            if (null === $answer) {
                throw new \RuntimeException('The longitude should be an integer');
            }

            return $answer;
        });
        $longitude2 = $helper->ask($input, $output, $question);

        $cubeService = new CubeService();
        $volume = $cubeService->calculateIntersectionVolume(
            $coordinates1,
            (int) $longitude1,
            $coordinates2,
            (int) $longitude2
        );

        $output->writeln([
            '',
            sprintf('Intersection volume: %s', number_format($volume, 2)),
        ]);
    }
}
