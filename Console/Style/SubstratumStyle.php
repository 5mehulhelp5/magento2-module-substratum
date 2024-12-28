<?php

/**
 * Copyright © Rob Aimes - https://aimes.dev/
 * https://github.com/robaimes
 */

namespace Aimes\Substratum\Console\Style;

use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Question\ChoiceQuestionFactory;
use Symfony\Component\Console\Style\StyleInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class SubstratumStyle extends SymfonyStyle implements StyleInterface
{
    protected const DEFAULT_PROGRESS_FORMAT =
        " <info>Current Progress: %current%/%max% [%bar%] %percent:3s%%</info> <fg=cyan>[%memory%]</>\n\n <comment>Estimated time remaining: %estimated%</comment>";

    public function __construct(
        InputInterface $input,
        OutputInterface $output,
        private readonly ChoiceQuestionFactory $choiceQuestionFactory,
    ) {
        parent::__construct($input, $output);
    }

    public function choice(string $question, array $choices, $default = null, bool $multiple = false)
    {
        if (null !== $default) {
            $values = array_flip($choices);
            $default = $values[$default] ?? $default;
        }

        $choiceQuestion = $this->choiceQuestionFactory->create([
            'question' => $question,
            'choices' => $choices,
            'default' => $default,
        ]);

        if ($multiple) {
            $choiceQuestion->setMultiselect(true);
        }

        return $this->askQuestion($choiceQuestion);
    }

    public function createProgressBar(int $max = 0, $format = self::DEFAULT_PROGRESS_FORMAT)
    {
        $progressBar = parent::createProgressBar($max);

        $progressBar->setBarWidth(50);
        $progressBar->setFormat($format);

        return $progressBar;
    }
}
