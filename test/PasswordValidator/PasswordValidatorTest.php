<?php

declare(strict_types=1);


namespace BristolPhpTraining\Test\PasswordValidator;

use BristolPhpTraining\PasswordValidator\PasswordValidator;
use PHPUnit\Framework\TestCase;

class PasswordValidatorTest extends TestCase
{

    /**
     * Dummy test. Only here to check that everything is setup and working. Replace this with a real test once ready.
     */
    public function testDummy()
    {
        $passwordValidator = new PasswordValidator();
        $this->assertTrue($passwordValidator->isValid("a string"));
    }
}
