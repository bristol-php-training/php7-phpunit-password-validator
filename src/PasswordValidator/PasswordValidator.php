<?php

declare(strict_types=1);


namespace BristolPhpTraining\PasswordValidator;


use BristolPhpTraining\PasswordStrengthCalculator\PasswordStrengthCalculatorInterface;

class PasswordValidator
{

    /**
     * @var PasswordStrengthCalculatorInterface
     */
    private $passwordStrengthCalculator;

    /**
     * PasswordValidator constructor.
     * @param PasswordStrengthCalculatorInterface $passwordStrengthCalculator
     */
    public function __construct(PasswordStrengthCalculatorInterface $passwordStrengthCalculator)
    {
        $this->passwordStrengthCalculator = $passwordStrengthCalculator;
    }


    /**
     * Returns true if password supplied is a valid password.
     *
     * A password is deemed valid if:
     * - minimum 8 characters
     * - contains 1 digit
     * - contains 1 lower case letter
     * - contains 1 upper case letter
     * - password strength > 3
     *
     * @param string $password
     * @return bool
     */
    public function isValid(string $password): bool
    {
        if ($this->passwordStrengthCalculator->getPasswordStrength($password) <= 3) {
            return false;
        }

        if (strlen($password) < 8) {
            return false;
        }

        if (preg_match('/[0-9]/', $password) !== 1) {
            return false;
        }

        if (preg_match('/[a-z]/', $password) !== 1) {
            return false;
        }

        if (preg_match('/[A-Z]/', $password) !== 1) {
            return false;
        }

        return true;
    }

}
