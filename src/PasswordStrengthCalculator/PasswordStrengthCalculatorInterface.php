<?php

declare(strict_types=1);


namespace BristolPhpTraining\PasswordStrengthCalculator;


interface PasswordStrengthCalculatorInterface
{

    /**
     * Returns a score for password strength. 0 is weak. 5 is strong.
     *
     * @param string $password
     * @return int
     */
    public function getPasswordStrength(string $password): int;
}
