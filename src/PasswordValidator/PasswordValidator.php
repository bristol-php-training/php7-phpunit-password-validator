<?php

declare(strict_types=1);


namespace BristolPhpTraining\PasswordValidator;


class PasswordValidator
{

    /**
     * Returns true if password supplied is a valid password.
     *
     * A password is deemed valid if:
     * - minimum 8 characters
     * - contains 1 digit
     * - contains 1 lower case letter
     * - contains 1 upper case letter
     * - not a previous password
     * 
     * @param string $password
     * @return bool
     */
    public function isValid(string $password): bool
    {
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
