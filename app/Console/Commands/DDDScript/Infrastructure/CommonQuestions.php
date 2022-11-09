<?php

declare(strict_types=1);


namespace App\Console\Commands\DDDScript\Infrastructure;


use Illuminate\Console\Command;

final class CommonQuestions
{
    public function __construct(private Command $command)
    {
    }

    public function __invoke(): string
    {
        $defaultIndex = 'src';
        $src = $this->command->anticipate('Where do you create this Module? (folder [src] by default)', [$defaultIndex], $defaultIndex);

        if (!is_dir($src)) {
            mkdir($src);
        }
        return $src;
    }
}
