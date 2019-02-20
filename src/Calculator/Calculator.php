<?php

declare(strict_types=1);


namespace BristolPhpTraining\Calculator;


interface Calculator
{
    public function calculate(int $a, int $b): int;
}
