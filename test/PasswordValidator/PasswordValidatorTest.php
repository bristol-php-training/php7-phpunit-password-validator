<?php

declare(strict_types=1);


namespace BristolPhpTraining\Test\PasswordValidator;

use BristolPhpTraining\PasswordValidator\PasswordValidator;
use PHPUnit\Framework\TestCase;

class PasswordValidatorTest extends TestCase
{

    public function testValidPassord(): void
    {
        $passwordValidator = new PasswordValidator();
        $this->assertTrue($passwordValidator->isValid('Passw0rd'));
    }


    public function invalidPasswordProvider(): array
    {
        return [
            'tooShort' => ['Passw0r'],
            'noDigits' => ['Password'],
            'noLowerCase' => ['PASSW0RD'],
            'noUpperCase' => ['passw0rd'],
        ];
    }


    /**
     * @dataProvider invalidPasswordProvider
     */
    public function testInvalidPassword(string $password): void
    {
        $passwordValidator = new PasswordValidator();
        $this->assertFalse($passwordValidator->isValid($password));
    }
}
