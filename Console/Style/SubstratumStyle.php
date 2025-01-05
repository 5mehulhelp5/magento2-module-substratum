<?php

/**
 * Copyright © Rob Aimes - https://aimes.dev/
 * https://github.com/robaimes
 */

namespace Aimes\Substratum\Console\Style;

use Symfony\Component\Console\Helper\ProgressBar;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\StyleInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class SubstratumStyle extends SymfonyStyle implements StyleInterface
{
    protected const DEFAULT_PROGRESS_FORMAT =
        " <info>Current Progress: %current%/%max% [%bar%] %percent:3s%%</info> <fg=cyan>[%memory%]</>\n\n <comment>Estimated time remaining: %estimated%</comment>";

    public function __construct(
        InputInterface $input,
        OutputInterface $output,
    ) {
        parent::__construct($input, $output);
    }

    public function createProgressBar(int $max = 0, $format = self::DEFAULT_PROGRESS_FORMAT): ProgressBar
    {
        $progressBar = parent::createProgressBar($max);

        $progressBar->setBarWidth(50);
        $progressBar->setFormat($format);

        return $progressBar;
    }
}
